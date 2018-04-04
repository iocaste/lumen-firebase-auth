<?php

namespace Iocaste\FirebaseAuth\Services;

use App\Exceptions\InvalidAudience;
use App\Exceptions\InvalidIssuer;
use App\Exceptions\InvalidUser;
use Firebase\JWT\JWT;

/**
 * Class Firebase
 */
class Firebase
{
    /**
     * @param string $token
     *
     * @return null|string
     * @throws InvalidAudience
     * @throws InvalidIssuer
     * @throws InvalidUser
     */
    public function getId(string $token): ?string
    {
        $content = file_get_contents(
            'https://www.googleapis.com/robot/v1/metadata/x509/securetoken@system.gserviceaccount.com'
        );

        $kids = json_decode($content, true);

        /** @var object $token */
        $token = JWT::decode($token, $kids, array('RS256'));

        $firebaseId = 'mates-f5667';
        $issuer = 'https://securetoken.google.com/' . $firebaseId;

        if ($token->aud !== $firebaseId) {
            throw new InvalidAudience('Invalid audience');
        }

        if ($token->iss !== $issuer) {
            throw new InvalidIssuer('Invalid issuer');
        }

        if (empty($token->sub)) {
            throw new InvalidUser('Invalid user');
        }

        return $token->sub;
    }
}
