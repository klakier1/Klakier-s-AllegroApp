<?php

namespace Klakier\AllegroAPI\Model\Shipping;

use Klakier\AllegroAPI\Model\Delivery\DeliveryMethod;

class Rate
{
    /**
     * @var DeliveryMethod
     */
    private $deliveryMethod;

    /**
     * @var int
     */
    private $maxQuantityPerPackage;

    /**
     * @var ItemRate
     */
    private $firstItemRate;

    /**
     * @var ItemRate
     */
    private $nextItemRate;

    /**
     * @var ShippingTime
     */
    private $shippingTime;


    /**
     * @return DeliveryMethod|null
     */
    public function getDeliveryMethod(): ?DeliveryMethod
    {
        return $this->deliveryMethod;
    }

    /**
     * @param DeliveryMethod|null $deliveryMethod
     *
     * @return Rates
     */
    public function setDeliveryMethod(?DeliveryMethod $deliveryMethod): Rate
    {
        $this->deliveryMethod = $deliveryMethod;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxQuantityPerPackage(): ?int
    {
        return $this->maxQuantityPerPackage;
    }

    /**
     * @param int|null $maxQuantityPerPackage
     *
     * @return Rates
     */
    public function setMaxQuantityPerPackage(?int $maxQuantityPerPackage): Rate
    {
        $this->maxQuantityPerPackage = $maxQuantityPerPackage;

        return $this;
    }

    /**
     * @return ItemRate|null
     */
    public function getFirstItemRate(): ?ItemRate
    {
        return $this->firstItemRate;
    }

    /**
     * @param ItemRate|null $firstItemRate
     *
     * @return Rates
     */
    public function setFirstItemRate(?ItemRate $firstItemRate): Rate
    {
        $this->firstItemRate = $firstItemRate;

        return $this;
    }

    /**
     * @return ItemRate|null
     */
    public function getNextItemRate(): ?ItemRate
    {
        return $this->nextItemRate;
    }

    /**
     * @param ItemRate|null $nextItemRate
     *
     * @return Rates
     */
    public function setNextItemRate(?ItemRate $nextItemRate): Rate
    {
        $this->nextItemRate = $nextItemRate;

        return $this;
    }

    /**
     * @return ShippingTime|null
     */
    public function getShippingTime(): ?ShippingTime
    {
        return $this->shippingTime;
    }

    /**
     * @param ShippingTime|null $shippingTime
     *
     * @return Rates
     */
    public function setShippingTime(?ShippingTime $shippingTime): Rate
    {
        $this->shippingTime = $shippingTime;

        return $this;
    }
}
