<?php

namespace App\Http\Packages\Printful\Shipping;


use App\Http\Packages\Printful\AbstractService;

class ShippingService extends AbstractService
{

    protected $requestParams = [];

    /** @var ShippingParams */
    protected $params;


    /**
     * @return ShippingParams
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     * @return ShippingService
     */
    public function setParams(ShippingParams $params)
    {
        $this->params = $params;
        return $this;
    }

    protected function prepareRequest()
    {
        $request = new ShippingRequest();
        $request->setZip($this->getParams()->getZip());
        $request->setStateCode($this->getParams()->getStateCode());
        $request->setCountryCode($this->getParams()->getCountryCode());
        $request->setAddress1($this->getParams()->getAddress1());
        $request->setCity($this->getParams()->getCity());
        $request->setItems($this->getParams()->getItems());

        $this->requestParams = $request->toArray();
    }


    protected function buildRequest()
    {
        $this->prepareRequest();
        $this->request = $this->client->buildRequest('POST', 'shipping/rates', $this->requestParams);
    }
}