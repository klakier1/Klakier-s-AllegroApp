<?php

namespace Klakier\AllegroAPI\Model\Shipping;

class ShippingRate
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
     * @var Rate[]
     */
    private $rates;

    /**
     * @var string
     */
    private $lastModified;


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
     * @return ShippingRate
     */
    public function setId(?string $id): ShippingRate
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
     * @return ShippingRate
     */
    public function setName(?string $name): ShippingRate
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Rate[]|null
     */
    public function getRates(): ?array
    {
        return $this->rates;
    }

    /**
     * @param Rate[]|null $rates
     *
     * @return ShippingRate
     */
    public function setRates(?array $rates): ShippingRate
    {
        $this->rates = $rates;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastModified(): ?string
    {
        return $this->lastModified;
    }

    /**
     * @param string|null $lastModified
     *
     * @return ShippingRate
     */
    public function setLastModified(?string $lastModified): ShippingRate
    {
        $this->lastModified = $lastModified;

        return $this;
    }
}
