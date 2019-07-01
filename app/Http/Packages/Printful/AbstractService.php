<?php

namespace App\Http\Packages\Printful;


use App\Http\Cache;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractService
{
    /** @var */
    protected $client;

    /** @var RequestInterface */
    protected $request;

    /** @var ResponseInterface */
    protected $response;

    /** @var Cache */
    protected $cache;

    /** @var string */
    protected $cacheKey;

    protected $requestParams;

    public function __construct(Client $client, Cache $cache)
    {
        $this->client = $client;
        $this->cache = $cache;
    }

    /**
     * @return $this
     */
    public function makeRequest()
    {
        if ($this->request === null) {
            $this->buildRequest();
        }

        $this->response = $this->client->request($this->request);
        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    abstract protected function buildRequest();

}