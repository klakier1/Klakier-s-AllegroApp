<?php

namespace Klakier\AllegroAPI\Model\Delivery;

class ItemRate
{
    /**
     * @var string
     */
    private $min;

    /**
     * @var string
     */
    private $max;

    /**
     * @var string
     */
    private $currency;


    /**
     * @return string|null
     */
    public function getMin(): ?string
    {
        return $this->min;
    }

    /**
     * @param string|null $min
     *
     * @return ItemRate
     */
    public function setMin(?string $min): ItemRate
    {
        $this->min = $min;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMax(): ?string
    {
        return $this->max;
    }

    /**
     * @param string|null $max
     *
     * @return ItemRate
     */
    public function setMax(?string $max): ItemRate
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     *
     * @return ItemRate
     */
    public function setCurrency(?string $currency): ItemRate
    {
        $this->currency = $currency;

        return $this;
    }
}
