<?php

namespace App\Http\Responses;


use App\Http\Dto\ShippingRateDto;

class ShippingRateResponse
{

    protected $shippingRates = [];

    public function __construct($result)
    {
        foreach ($result['result'] as $item) {
            $dto = new ShippingRateDto();
            $dto->id = $item['id'];
            $dto->name = $item['name'];
            $dto->rate = $item['rate'];
            $dto->currency = $item['currency'];

            $this->shippingRates[] = $dto;
        }

    }

    public function toArray()
    {
        return [
            'shippingRates' => $this->shippingRates
        ];
    }

}