<?php


namespace App\repositories;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiRepository
{

    protected $client;


    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        return $this->get('posts/');
    }


    protected function get(string $url)
    {
        try {
            $response = $this->client->request('GET', $url);
        } catch (GuzzleException $e) {
            return $e;
        }
        return json_decode($response->getBody()->getContents());
    }
}
