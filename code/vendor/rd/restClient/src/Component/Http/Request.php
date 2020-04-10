<?php

namespace RestClient\Component\Http;

/**
 * Request
 * 
 * obiekt klasy zostaje przekazany do klienta w celu połączenia http, np. Curl
 */
Class Request
{
    private $method;
    private $uri;
    private $data = [];
    private $headers = [];
    
    /**
     * setHeaders
     *
     * ustawia nagłówki
     * 
     * @param  array $headers
     * @return void
     */
    public function setHeaders(array $headers) : void
    {
        $this->headers = $headers;
    }
    
    /**
     * getHeaders
     *
     * zwraca nagłówki
     * 
     * @return array
     */
    public function getHeaders() : array
    {
        return $this->headers;
    }
    
    /**
     * getData
     *
     * zwraca dane
     * 
     * @return array
     */
    public function getData() : ?array
    {
        return $this->data;
    }
    
    /**
     * getUri
     *
     * zwraca adres url
     * 
     * @return string
     */
    public function getUri() : string
    {
        return $this->uri;
    }
    
    /**
     * getMethod
     *
     * zwraca metodę {get, pull, push, post, delete}
     * 
     * @return string
     */
    public function getMethod() : string
    {
        return $this->method;
    }
    
    /**
     * setData
     *
     * ustawia dane
     * 
     * @param  array $data
     * @return void
     */
    public function setData(array $data = null) : void
    {
        $this->data = $data;
    }
    
    /**
     * setUri
     *
     * ustawia adres połączenia url
     * 
     * @param  string $uri
     * @return void
     */
    public function setUri(string $uri) : void
    {
        $this->uri = $uri;
    }
    
    /**
     * setMethod
     *
     * ustawia metodę połączenia {get, pull, push, post, delete}
     * 
     * @param  string $method
     * @return void
     */
    public function setMethod(string $method) : void
    {
        $this->method = $method;
    }
}
