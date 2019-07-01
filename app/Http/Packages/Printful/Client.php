<?php

namespace App\Http\Packages\Printful;


use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class Client
{
    /** @var \GuzzleHttp\Client */
    protected $guzzleClient;

    public function __construct()
    {
        $this->guzzleClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.printful.com',
            'http_errors' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode(env('PRINTFUL_TOKEN'))
            ]
        ]);
    }

    /**
     * @param RequestInterface $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request(RequestInterface $request)
    {
        return $this->guzzleClient->send($request);
    }

    /**
     * @param $method
     * @param $uri
     * @param array $params
     * @param array $headers
     * @return Request
     */
    public function buildRequest($method, $uri, array $params, array $headers = [])
    {
        return new Request($method, $uri, $headers, json_encode($params));
    }

}