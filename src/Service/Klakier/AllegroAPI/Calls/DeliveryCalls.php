<?php

namespace Klakier\AllegroAPI\Calls;

use Klakier\AllegroAPI\Api;
use Klakier\AllegroAPI\Model\Delivery\DeliveryMethod;
use Symfony\Component\Serializer\Serializer;
use Klakier\AllegroAPI\Utils\ModelSerializer;
use Klakier\AllegroAPI\Model\Shipping\ShippingRate;
use Klakier\AllegroAPI\Model\Shipping\ShippingRates;
use Klakier\AllegroAPI\Model\Delivery\DeliveryMethods;

class DeliveryCalls
{
    /**
     * @var Api
     */
    private $api;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * Cached delivery methods
     * @var DeliveryMethods
     */
    private $deliveryMethods;

    public function __construct(Api $api)
    {
        $this->api = $api;
        $this->serializer = ModelSerializer::getSerializer();
    }

    /**
     * getDeliveryMethods
     *
     * @return DeliveryMethods
     */
    public function fetchDeliveryMethods(): DeliveryMethods
    {
        $jsonDelivery = $this->api->callGetMethod($this->api->cookieToken(), "/sale/delivery-methods", true);
        /**
         * @var DeliveryMethods
         */
        $deliveryMethods = $this->serializer->deserialize($jsonDelivery, DeliveryMethods::class, 'json');
        return $deliveryMethods;
    }

    /**
     * Return object with array of ShippingRate objects.
     * They contain only name and id.
     * For details use getShippingRate with id as argument.
     *
     * @return ShippingRates
     */
    public function fetchShippingRates(): ShippingRates
    {
        $jsonShipping = $this->api->callGetMethod($this->api->cookieToken(), "/sale/shipping-rates", true);
        /**
         * @var ShippingRates
         */
        $shippingRates = $this->serializer->deserialize($jsonShipping, ShippingRates::class, 'json');
        return $shippingRates;
    }

    /**
     * getShippingRate
     *
     * @param string $id
     * 
     * @return ShippingRate
     */
    public function fetchShippingRate(string $id): ShippingRate
    {
        $jsonShipping = $this->api->callGetMethod($this->api->cookieToken(), "/sale/shipping-rates/{$id}", true);
        /**
         * @var ShippingRate
         */
        $shippingRate = $this->serializer->deserialize($jsonShipping, ShippingRate::class, 'json');
        return $shippingRate;
    }

    public function fetchDeliveryMethod(string $id): DeliveryMethod
    {
        //cache deliveryMethods
        $this->deliveryMethods = $this->deliveryMethods ?? $this->fetchDeliveryMethods();

        $arrayOfDeliveryMethods = $this->deliveryMethods->getDeliveryMethods();
        //filter array by id and return first elemnt of new array
        $result = array_filter($arrayOfDeliveryMethods, fn ($val) => !strcmp($val->getId(), $id));

        return reset($result);
    }

    public function fetchShippingRatesWithDeliveyMethods()
    {
        $arrayOfShippingRates = $this->fetchShippingRates()->getShippingRates();

        for ($i = 0; $i < count($arrayOfShippingRates); $i++) {
            $id = $arrayOfShippingRates[$i]->getId();
            $arrayOfShippingRates[$i] = $this->fetchShippingRate($id);

            $rates = $arrayOfShippingRates[$i]->getRates();
            for ($j = 0; $j < count($rates); $j++) {
                $rateId = $rates[$j]->getDeliveryMethod()->getId();
                $deliveryMethod = $this->fetchDeliveryMethod($rateId);
                $rates[$j]->setDeliveryMethod($deliveryMethod);
            }
        }

        return $arrayOfShippingRates;
    }

    public function fetchShippingRateWithDeliveyMethods($id)
    {
        $shippingRate = $this->fetchShippingRate($id);
        $rates = $shippingRate->getRates();
        for ($j = 0; $j < count($rates); $j++) {
            $rateId = $rates[$j]->getDeliveryMethod()->getId();
            $deliveryMethod = $this->fetchDeliveryMethod($rateId);
            $rates[$j]->setDeliveryMethod($deliveryMethod);
        }

        return $shippingRate;
    }
}
