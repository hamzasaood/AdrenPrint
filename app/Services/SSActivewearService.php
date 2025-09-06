<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SSActivewearService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.ssactivewear.base_url'),
            'auth' => [
                config('services.ssactivewear.account_number'),
                config('services.ssactivewear.api_key')
            ],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getProducts($params = [])
    {
        try {
            $response = $this->client->get('products', [
                'query' => $params
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {
            return [
                'error' => $e->getMessage(),
                'response' => $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
            ];
        }
    }

    public function getProductById($productId)
    {
        try {
            $response = $this->client->get("products/{$productId}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return [
                'error' => $e->getMessage(),
                'response' => $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
            ];
        }
    }
}
