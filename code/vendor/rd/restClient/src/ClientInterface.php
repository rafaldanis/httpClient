<?php

namespace RestClient;

use RestClient\Component\Authorization\AuthorizationInterface;
use RestClient\Component\Http\Response;

interface ClientInterface
{
    public function setAuthorization(AuthorizationInterface $authorization) : void;

    public function get(string $uri) : Response;

    public function post(string $uri, array $data) : Response;

    public function put(string $uri, array $data) : Response;

    public function delete(string $uri) : Response;
}
