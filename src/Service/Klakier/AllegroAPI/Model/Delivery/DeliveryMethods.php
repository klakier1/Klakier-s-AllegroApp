<?php

namespace Klakier\AllegroAPI\Model\Delivery;

class DeliveryMethods
{
    /**
     * @var DeliveryMethod[]
     */
    private $deliveryMethods;

    /**
     * @return DeliveryMethod[]|null
     */
    public function getDeliveryMethods(): ?array
    {
        return $this->deliveryMethods;
    }

    /**
     * @param DeliveryMethod[]|null $deliveryMethods
     *
     * @return DeliveryMethods
     */
    public function setDeliveryMethods(?array $deliveryMethods): DeliveryMethods
    {
        $this->deliveryMethods = $deliveryMethods;

        return $this;
    }
}
