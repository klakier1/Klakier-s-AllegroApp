<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CustomProduct
{

    private $id;

    /**
     * @SerializedName("namess")
     */
    private $name;

    /**
     * @var Product[]
     */
    private $otherobject;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Product[]
     */
    public function getOtherobject(): ?array
    {
        return $this->otherobject;
    }

    /**
     * setOtherobject
     *
     * @param Product[] $otherobject
     * 
     * @return self
     */
    public function setOtherobject($otherobject): self
    {
        $this->otherobject = $otherobject;

        return $this;
    }
}
