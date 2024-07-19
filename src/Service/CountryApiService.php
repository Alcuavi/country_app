<?php

namespace App\Service;

use GuzzleHttp\Client;

class CountryApiService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://restcountries.com/v3.1/'
        ]);
    }

    public function fetchCountries(): array
    {
        $response = $this->client->request('GET', 'all');
        return json_decode($response->getBody()->getContents(), true);
    }
}