<?php


namespace App\repositories;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class ApiRepository
{

    protected $client;


    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        return $this->get('employees');
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

    public function post(array $body)
    {
        return $this->client->post('create', ['form_params' => $body]);
    }
}
