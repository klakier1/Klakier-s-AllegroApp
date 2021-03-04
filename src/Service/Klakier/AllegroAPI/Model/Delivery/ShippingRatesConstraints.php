<?php

namespace Klakier\AllegroAPI\Model\Delivery;

class ShippingRatesConstraints
{
    /**
     * @var bool
     */
    private $allowed;

    /**
     * @var MaxQuantityPerPackage
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
     * @return bool|null
     */
    public function isAllowed(): ?bool
    {
        return $this->allowed;
    }

    /**
     * @param bool|null $allowed
     *
     * @return ShippingRatesConstraints
     */
    public function setAllowed(?bool $allowed): ShippingRatesConstraints
    {
        $this->allowed = $allowed;

        return $this;
    }

    /**
     * @return MaxQuantityPerPackage|null
     */
    public function getMaxQuantityPerPackage(): ?MaxQuantityPerPackage
    {
        return $this->maxQuantityPerPackage;
    }

    /**
     * @param MaxQuantityPerPackage|null $maxQuantityPerPackage
     *
     * @return ShippingRatesConstraints
     */
    public function setMaxQuantityPerPackage(?MaxQuantityPerPackage $maxQuantityPerPackage): ShippingRatesConstraints
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
     * @return ShippingRatesConstraints
     */
    public function setFirstItemRate(?ItemRate $firstItemRate): ShippingRatesConstraints
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
     * @return ShippingRatesConstraints
     */
    public function setNextItemRate(?ItemRate $nextItemRate): ShippingRatesConstraints
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
     * @return ShippingRatesConstraints
     */
    public function setShippingTime(?ShippingTime $shippingTime): ShippingRatesConstraints
    {
        $this->shippingTime = $shippingTime;

        return $this;
    }
}
