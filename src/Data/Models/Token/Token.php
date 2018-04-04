<?php

namespace App\Data\Models\Token;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class Token
 */
class Token
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var Authenticatable
     */
    public $user;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return Authenticatable
     */
    public function getUser(): Authenticatable
    {
        unset($this->user->password);

        return $this->user;
    }

    /**
     * Token constructor.
     *
     * @param string $token
     * @param Authenticatable $user
     */
    public function __construct(string $token, Authenticatable $user)
    {
        $this->token = $token;
        $this->user = $user;
    }
}
