<?php
/**
 * Created by PhpStorm.
 * User: throzen
 * Date: 30.06.2019
 * Time: 22:22
 */

namespace App\Http\Packages\Printful\Shipping;


use Illuminate\Support\Collection;

class ShippingParams
{

    /**
     * @var string
     */
    protected $address1 = null;

    /**
     * @var string
     */
    protected $city = null;

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

    public function __construct()
    {
        $this->items = new Collection();
    }

    /**
     * @return string
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return ShippingParams
     */
    public function setAddress1(?string $address1): ShippingParams
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
     * @return ShippingParams
     */
    public function setCity(?string $city): ShippingParams
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
     * @return ShippingParams
     */
    public function setCountryCode(string $countryCode): ShippingParams
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
     * @return ShippingParams
     */
    public function setStateCode(?string $stateCode): ShippingParams
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
     * @return ShippingParams
     */
    public function setZip(?int $zip): ShippingParams
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
     * @return ShippingParams
     */
    public function setItems(?Collection $items): ShippingParams
    {
        $this->items = $items;
        return $this;
    }


    public function toArray()
    {
        return [
            'address1' => $this->getAddress1(),
            'city' => $this->getCity(),
            'countryCode' => $this->getCountryCode(),
            'stateCode' => $this->getStateCode(),
            'zip' => $this->getZip(),
            'items' => $this->getItems()->toArray()
        ];
    }


}