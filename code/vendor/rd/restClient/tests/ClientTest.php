<?php
declare(strict_types=1);

namespace Tests;

require_once(__DIR__ . '/../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use RestClient\Client;
use RestClient\Component\Curl\Curl;

class ClientTest extends TestCase
{    
    protected function setUp():void
    {
        
    }
    
    public function testObCurlClass() : void
    {
        $this->assertInstanceOf('RestClient\Component\LibraryInterface', new Curl());
    }

    public function testObClientClass() : void
    {
        $this->assertInstanceOf('RestClient\ClientInterface', new Client(new Curl()));
    }

    public function testGetClient() : void
    {
        $client = new Client(new Curl());

        $this->assertInstanceOf('RestClient\Component\Http\Response', $client->get('http://dummy.restapiexample.com/api/v1/employees'));
    }

    public function testFailUriGetClient() : void
    {
        $client = new Client(new Curl());

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(400);

        $this->assertInstanceOf('RestClient\Component\Http\Response', $client->get('sdfsdf'));
    }

    public function testObjectClient() : void
    {
        $client = new Client(new Curl());
        $response = $client->get('http://dummy.restapiexample.com/api/v1/employees');
        $this->assertInstanceOf('RestClient\Component\Http\Response', $response);
    }

    public function testHeaderClient() : void
    {
        $client = new Client(new Curl());
        $response = $client->get('http://dummy.restapiexample.com/api/v1/employees');
        $this->assertIsString($response->getHeaders('http_code'));
    }

    public function testBodyClient() : void
    {
        $client = new Client(new Curl());
        $response = $client->get('http://dummy.restapiexample.com/api/v1/employees');
        $this->assertIsString($response->getBody());
    }
}
