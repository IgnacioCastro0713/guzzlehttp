<?php


namespace App\repositories;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiRepository
{

    protected $client;


    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/todos',
            'timeout'  => 2.0,
        ]);
    }

    public function getAll()
    {
        try {
            $response = $this->client->request('GET');
        } catch (GuzzleException $exception) {
            return $exception;
        }
        return json_decode($response->getBody()->getContents());
    }
}
