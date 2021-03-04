<?php

namespace Klakier\AllegroAPI\Model\Delivery;

class MaxQuantityPerPackage
{
    /**
     * @var int
     */
    private $max;


    /**
     * @return int|null
     */
    public function getMax(): ?int
    {
        return $this->max;
    }

    /**
     * @param int|null $max
     *
     * @return MaxQuantityPerPackage
     */
    public function setMax(?int $max): MaxQuantityPerPackage
    {
        $this->max = $max;

        return $this;
    }
}
