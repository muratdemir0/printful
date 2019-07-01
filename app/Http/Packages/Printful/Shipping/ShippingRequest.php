<?php
/**
 * Created by PhpStorm.
 * User: throzen
 * Date: 30.06.2019
 * Time: 22:22
 */

namespace App\Http\Packages\Printful\Shipping;


use Illuminate\Support\Collection;

class ShippingRequest
{
    /**
     * @var string
     */
    protected $address1;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $stateCode;

    /**
     * @var integer
     */
    protected $zip;

    /**
     * @var Collection
     */
    protected $items;

    /**
     * @return string
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return ShippingRequest
     */
    public function setAddress1(?string $address1): ShippingRequest
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return ShippingRequest
     */
    public function setCity(?string $city): ShippingRequest
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return ShippingRequest
     */
    public function setCountryCode(string $countryCode): ShippingRequest
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateCode(): ?string
    {
        return $this->stateCode;
    }

    /**
     * @param string $stateCode
     * @return ShippingRequest
     */
    public function setStateCode(?string $stateCode): ShippingRequest
    {
        $this->stateCode = $stateCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getZip(): ?int
    {
        return $this->zip;
    }

    /**
     * @param int $zip
     * @return ShippingRequest
     */
    public function setZip(?int $zip): ShippingRequest
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     * @return ShippingRequest
     */
    public function setItems(?Collection $items): ShippingRequest
    {
        $this->items = $items;
        return $this;
    }


    public function toArray()
    {
        return [
            'recipient' => [
                'address1' => $this->getAddress1(),
                'city' => $this->getCity(),
                'country_code' => $this->getCountryCode(),
                'state_code' => $this->getStateCode(),
                'zip' => $this->getZip()
            ],
            'items' => $this->getItems()->toArray()
        ];
    }

}