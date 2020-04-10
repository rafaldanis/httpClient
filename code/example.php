<?php
require_once __DIR__ . '/vendor/autoload.php';

use RestClient\Client;
use RestClient\Component\Curl\Curl;

$client = new Client(new Curl());
#$client->setAuthorization(new AuthorizationJWT('EOrJCqpBf_TdqyduHPmrVZq1oNqGZxhxC9SL'));

$response = $client->get('http://dummy.restapiexample.com/api/v1/employees');
print_r($response->getHeaders('http_code'));
print_r($response->getBody());

echo '<br /><br />--------------------<br /><br />';

$data = ['name' => 'test','salary' => '123', 'age' => '23'];
$response = $client->post('http://dummy.restapiexample.com/api/v1/create', $data);

print_r($response->getHeaders('http_code'));
print_r($response->getBody());

echo '<br /><br />--------------------<br /><br />';

$data = ['name' => 'testowy','salary' => '123', 'age' => '23'];

$response = $client->put('http://dummy.restapiexample.com/api/v1/update/48', $data);
print_r($response->getHeaders('http_code'));
print_r($response->getBody());

echo '<br /><br />--------------------<br /><br />';

$response = $client->delete('http://dummy.restapiexample.com/api/v1/delete/43');

print_r($response->getHeaders('http_code'));
print_r($response->getBody());