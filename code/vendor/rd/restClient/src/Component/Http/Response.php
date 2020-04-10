<?php

namespace RestClient\Component\Http;

/**
 * Response
 * 
 * klasa zostaje zwrócona przez klienta
 * 
 */
Class Response
{    
    /**
     * body
     *
     * content pobrany przez klienta
     * 
     * @var mixed
     */
    private $body;

    /**
     * headers
     * 
     * nagłówki zwrocone przez klienta
     * 
     * @var mixed
     */
    private $headers;
    
    /**
     * setHeaders
     *
     * ustawia nagłówki, param $headers w formie json
     * 
     * @param  string $headers
     * @return void
     */
    public function setHeaders(string $headers) : void
    {
        $this->headers = $headers;
    }
    
    /**
     * setBody
     *
     * ustawia body, param $body w formie json
     * 
     * @param  string $body
     * @return void
     */
    public function setBody(string $body) : void
    {
        $this->body = $body;
    }
    
    /**
     * getBody
     *
     * zwraca body jako json
     * 
     * @return string
     */
    public function getBody() : string
    {
        return $this->body;
    }
    
    /**
     * getHeaders
     *
     * zwraca nagłówek, jako param podajemy indeks, w przeciwnym wypadku zwraca null
     * 
     * @param  string $index
     * @return string
     */
    public function getHeaders(string $index) : ?string
    {
        $headers = json_decode($this->headers, true);

        return isset($headers[$index]) ? $headers[$index] : null;
    }
}
