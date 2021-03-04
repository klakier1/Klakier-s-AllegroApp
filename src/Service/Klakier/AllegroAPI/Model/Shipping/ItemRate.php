<?php

namespace Klakier\AllegroAPI\Model\Shipping;

class ItemRate
{
    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;


    /**
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * @param string|null $amount
     *
     * @return ItemRate
     */
    public function setAmount(?string $amount): ItemRate
    {
        $this->amount = $amount;

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
