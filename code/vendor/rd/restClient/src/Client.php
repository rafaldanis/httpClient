<?php

namespace RestClient;

use RestClient\Component\Http\Request;
use RestClient\Component\Http\Response;
use RestClient\ClientInterface;
use RestClient\Component\LibraryInterface;
use RestClient\Component\Authorization\AuthorizationInterface;

/**
 * Client
 * 
 * restClient, klasa wywoływana przez kod kliencki
 * 
 * Służy do połączeń http z api
 * 
 */
class Client implements ClientInterface
{
        
    /**
     * library
     *
     * biblioteka za pomocą której będziemy się łączyć z serwerem np curl
     * RestClient\Component\LibraryInterface
     * 
     * @var mixed
     */
    private $library;
    
    /**
     * request
     *
     * obiekt klasy RestClient\Component\Http\Request
     * 
     * @var mixed
     */
    private $request;
    
    /**
     * authorization
     *
     * obiekt klasy autoryzacji, basic lub jwt
     * RestClient\Component\Authorization\AuthorizationInterface
     * 
     * @var mixed
     */
    private $authorization = null;
        
    /**
     * response
     *
     * obiekt klasy RestClient\Component\Http\Response
     * 
     * @var mixed
     */
    private $response;

    /**
     * __construct
     *
     * Ustawia library np. curl, obiekty request oraz response
     * 
     * @param  mixed $library
     * @return void
     */
    public function __construct(LibraryInterface $library)
    {       
        $this->library = $library;
        $this->request = new Request();
        $this->response = new Response();
    }    
    
    /**
     * setAuthorization
     *
     * tworzy obiekt autoryzacji
     * 
     * @param  mixed $authorization
     * @return void
     */
    public function setAuthorization(AuthorizationInterface $authorization) : void
    {
        $this->authorization = $authorization;
    }
    
    /**
     * get
     *
     * metoda GET - pobiera informacje
     * 
     * @param  string $uri
     * @return Response
     */
    public function get(string $uri = null) : Response
    {
        $request = $this->createRequest($uri, 'GET', $this->authorization);

        return $this->createResponse($this->library->sendRequest($request));
    }  
    
    /**
     * post
     *
     * metoda POST - zapisuje nowe dane
     * 
     * @param  string $uri
     * @param  array $data
     * @return Response
     */
    public function post(string $uri = null, array $data) : Response
    {
        $request = $this->createRequest($uri, 'POST', $this->authorization, $data);
        return $this->createResponse($this->library->sendRequest($request));
    }
    
    /**
     * put
     *
     * metoda PUT - aktualizuje dane
     * 
     * @param  mixed $uri
     * @param  mixed $data
     * @return Response
     */
    public function put(string $uri = null, array $data) : Response
    {
        $request = $this->createRequest($uri, 'PUT', $this->authorization, $data);
        return $this->createResponse($this->library->sendRequest($request));
    }
    
    /**
     * delete
     *
     * metoda DELETE - usuwa dane
     * 
     * @param  mixed $uri
     * @param  mixed $data
     * @return Response
     */
    public function delete(string $uri = null) : Response
    {
        $request = $this->createRequest($uri, 'DELETE', $this->authorization);
        return $this->createResponse($this->library->sendRequest($request));
    }

    /**
     * createRequest
     *
     * tworzy request
     * 
     * @param  string $uri
     * @param  string $method
     * @param  array $headers
     * @return Request
     */
    private function createRequest(string $uri, string $method, array $headers = null, array $data = null) : Request
    {
        if (!filter_var($uri, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Błędny adres url', 400);
        }

        $this->request->setUri($uri);
        
        $this->request->setMethod($method);
        
        $this->request->setHeaders(($headers) ? $headers->get() : []);
        
        $this->request->setData($data);

        return $this->request;
    }
        
    /**
     * createResponse
     *
     * tworzy obiekt Response
     * 
     * @param  array $response
     * @return Response
     */
    private function createResponse(array $response) : Response
    {
        $this->response->setBody($response['body']);
        $this->response->setHeaders($response['headers']);

        return $this->response;
    }
    
}
