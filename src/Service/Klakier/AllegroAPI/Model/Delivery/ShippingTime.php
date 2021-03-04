<?php

namespace Klakier\AllegroAPI\Model\Delivery;

class ShippingTime
{
    /**
     * @var DefaultPeriod
     */
    private $default;

    /**
     * @var bool
     */
    private $customizable;


    /**
     * @return DefaultPeriod|null
     */
    public function getDefault(): ?DefaultPeriod
    {
        return $this->default;
    }

    /**
     * @param DefaultPeriod|null 
     *
     * @return ShippingTime
     */
    public function setDefault(?DefaultPeriod $default): ShippingTime
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isCustomizable(): ?bool
    {
        return $this->customizable;
    }

    /**
     * @param bool|null $customizable
     *
     * @return ShippingTime
     */
    public function setCustomizable(?bool $customizable): ShippingTime
    {
        $this->customizable = $customizable;

        return $this;
    }
}
