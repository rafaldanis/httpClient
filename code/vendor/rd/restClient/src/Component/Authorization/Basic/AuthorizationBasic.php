<?php

namespace RestClient\Component\Authorization\Basic;

use RestClient\Component\Authorization\AbstractAuthorization;
use RestClient\Component\Authorization\AuthorizationInterface;

/**
 * AuthorizationBasic
 * 
 * Autoryzacja basic dla curl: CURLOPT_USERPWD, 'email_address' . ':' . 'password'
 * 
 */
class AuthorizationBasic extends AbstractAuthorization implements AuthorizationInterface
{
       
    /**
     * __construct
     *
     * Ustawia name i password dla autoryzacji oraz indeks dla header curl
     * 
     * @param  string $name
     * @param  string $password
     * @return void
     */
    public function __construct(string $name, string $password)
    {
        $this->value = $name . ':' . $password;
        $this->index = 'CURLOPT_USERPWD';
    }
}
