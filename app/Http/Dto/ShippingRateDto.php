<?php
/**
 * Created by PhpStorm.
 * User: throzen
 * Date: 1.07.2019
 * Time: 21:31
 */

namespace App\Http\Dto;


class ShippingRateDto
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $rate;

    /** @var string */
    public $currency;
}