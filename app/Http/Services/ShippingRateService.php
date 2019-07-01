<?php

namespace App\Http\Services;


use App\Http\Cache;
use App\Http\Packages\Printful\Shipping\ShippingParams;
use App\Http\Packages\Printful\Shipping\ShippingService;

class ShippingRateService
{
    /** @var Cache */
    protected $cache;

    /**
     * ShippingRateService constructor.
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param ShippingParams $params
     * @return mixed|null|string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function calculateShippingRate(ShippingParams $params)
    {
        if ($this->cache->get(md5(json_encode($params->toArray())))) {
            return $this->cache->get(md5(json_encode($params->toArray())));
        }
        /** @var ShippingService $shippingService */
        $shippingService = app()->make(ShippingService::class);

        $response = $shippingService
            ->setParams($params)
            ->makeRequest()
            ->getResponse()
            ->getBody()
            ->getContents();


        $this->cache->set(md5(json_encode($params->toArray())), $response, 300);

        return $response;
    }


}