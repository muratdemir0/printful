<?php

namespace App\Http\Controllers;

use App\Http\Packages\Printful\Shipping\ShippingParams;
use App\Http\Requests\ShippingRequest;
use App\Http\Responses\ShippingRateResponse;
use App\Http\Services\ShippingRateService;
use Symfony\Component\HttpFoundation\Request;

class ShippingController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(ShippingRequest $request)
    {
        /** @var ShippingRateService $shippingRateService */
        $shippingRateService = app()->make(ShippingRateService::class);

        $params = new ShippingParams();
        $params->setAddress1($request->get('address'));
        $params->setCity($request->get('city'));
        $params->setCountryCode($request->get('countryCode'));
        $params->setStateCode($request->get('stateCode'));
        $params->setZip($request->get('zip'));

        foreach ($request->get('items') as $item) {
            $params->getItems()->add($item);
        }


        $response = $shippingRateService->calculateShippingRate($params);


        return response((new ShippingRateResponse(json_decode($response, 1)))->toArray(), 200);
    }
}
