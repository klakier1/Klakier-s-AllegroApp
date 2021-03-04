<?php

namespace Klakier\AllegroAPI\Model\Delivery;

class DeliveryMethod
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $paymentPolicy;

    /**
     * @var bool
     */
    private $allegroEndorsed;

    /**
     * @var ShippingRatesConstraints
     */
    private $shippingRatesConstraints;


    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return DeliveryMethod
     */
    public function setId(?string $id): DeliveryMethod
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return DeliveryMethod
     */
    public function setName(?string $name): DeliveryMethod
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentPolicy(): ?string
    {
        return $this->paymentPolicy;
    }

    /**
     * @param string|null $paymentPolicy
     *
     * @return DeliveryMethod
     */
    public function setPaymentPolicy(?string $paymentPolicy): DeliveryMethod
    {
        $this->paymentPolicy = $paymentPolicy;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isAllegroEndorsed(): ?bool
    {
        return $this->allegroEndorsed;
    }

    /**
     * @param bool|null $allegroEndorsed
     *
     * @return DeliveryMethod
     */
    public function setAllegroEndorsed(?bool $allegroEndorsed): DeliveryMethod
    {
        $this->allegroEndorsed = $allegroEndorsed;

        return $this;
    }

    /**
     * @return ShippingRatesConstraints|null
     */
    public function getShippingRatesConstraints(): ?ShippingRatesConstraints
    {
        return $this->shippingRatesConstraints;
    }

    /**
     * @param ShippingRatesConstraints|null $shippingRatesConstraints
     *
     * @return DeliveryMethod
     */
    public function setShippingRatesConstraints(?ShippingRatesConstraints $shippingRatesConstraints): DeliveryMethod
    {
        $this->shippingRatesConstraints = $shippingRatesConstraints;

        return $this;
    }
}
