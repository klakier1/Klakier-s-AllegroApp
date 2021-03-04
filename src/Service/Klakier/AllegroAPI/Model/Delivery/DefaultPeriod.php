<?php

namespace Klakier\AllegroAPI\Model\Delivery;

class DefaultPeriod
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
     * @return DefaultPeriod
     */
    public function setFrom(?string $from): DefaultPeriod
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
     * @return DefaultPeriod
     */
    public function setTo(?string $to): DefaultPeriod
    {
        $this->to = $to;

        return $this;
    }
}
