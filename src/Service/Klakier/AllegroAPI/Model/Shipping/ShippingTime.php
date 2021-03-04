<?php

namespace Klakier\AllegroAPI\Model\Shipping;

class ShippingTime
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;


    /**
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * @param string|null $from
     *
     * @return ShippingTime
     */
    public function setFrom(?string $from): ShippingTime
    {
        $this->from = $from;
        
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }

    /**
     * @param string|null $to
     *
     * @return ShippingTime
     */
    public function setTo(?string $to): ShippingTime
    {
        $this->to = $to;
        
        return $this;
    }
}

