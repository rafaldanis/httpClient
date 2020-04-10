<?php

namespace RestClient\Component\Curl;

use RestClient\Component\Http\Request;
use RestClient\Component\LibraryInterface;

/**
 * Curl
 * 
 * biblioteka połączeń http
 * 
 */
Class Curl implements LibraryInterface
{
    /**
     * ch
     * 
     * curl handler
     * 
     * @var mixed
     */
    private $ch;

    
    /**
     * headers
     *
     * nagłówki curl
     * 
     * @var array
     */
    private $headers = [];
    
    /**
     * __construct
     *
     * inicjuje curl i ustawia domyślne wartości
     * 
     * @return void
     */
    public function __construct()
    {
        $this->ch = curl_init();
        $this->headers = ['Content-Type: application/json'];
        
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
    }
        
    /**
     * sendRequest
     *
     * Wysyła request
     * 
     * @param  Request $request
     * @return array
     */
    public function sendRequest(Request $request) : array
    {
        $options[CURLOPT_URL] = $request->getUri();
        $options[CURLOPT_CUSTOMREQUEST] = $request->getMethod();
        $options[CURLOPT_POST] = ($request->getMethod() == 'POST') ? true : false;
        $options[CURLOPT_POSTFIELDS] = json_encode((!empty($request->getData()) ? $request->getData() : []));

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array_merge($this->headers, $request->getHeaders()));    
        curl_setopt_array($this->ch, $options);

        return [
            'body' => curl_exec($this->ch),
            'headers' => json_encode(curl_getinfo($this->ch))
        ];
    }
    
    /**
     * __destruct
     *
     * zamyka curl
     * 
     * @return void
     */
    public function __destruct()
    {
        curl_close($this->ch);
    }
}
