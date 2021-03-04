<?php

namespace Klakier\AllegroAPI\Model\Shipping;

class ShippingRates
{
    /**
     * @var ShippingRate[]
     */
    private $shippingRates;

    /**
     * @return ShippingRate[]|null
     */
    public function getShippingRates(): ?array
    {
        return $this->shippingRates;
    }

    /**
     * @param ShippingRate[]|null $shippingRates
     *
     * @return ShippingRates
     */
    public function setShippingRates(?array $shippingRates): ShippingRates
    {
        $this->shippingRates = $shippingRates;

        return $this;
    }
}
