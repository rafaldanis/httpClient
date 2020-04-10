<?php

namespace RestClient\Component\Authorization\JWT;

use RestClient\Component\Authorization\AbstractAuthorization;
use RestClient\Component\Authorization\AuthorizationInterface;

/**
 * AuthorizationJWT
 * 
 * autoryzacja jwt token Authorization: Baearer {token}
 * 
 */
class AuthorizationJWT extends AbstractAuthorization implements AuthorizationInterface
{    
    /**
     * __construct
     *
     * Ustawia token do autoryzacji oraz indeks dla header curl
     * 
     * @param  string $token
     * @return void
     */
    public function __construct(string $token)
    {
        $this->value = 'Bearer ' . $token;
        $this->index = 'Authorization';
    }
}
