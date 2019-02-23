<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductCategories", mappedBy="product_id", orphanRemoval=true)
     */
    private $productCategories;

    public function __construct()
    {
        $this->productCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|ProductCategories[]
     */
    public function getProductCategories(): Collection
    {
        return $this->productCategories;
    }

    public function addProductCategory(ProductCategories $productCategory): self
    {
        if (!$this->productCategories->contains($productCategory)) {
            $this->productCategories[] = $productCategory;
            $productCategory->setProductId($this);
        }

        return $this;
    }

    public function removeProductCategory(ProductCategories $productCategory): self
    {
        if ($this->productCategories->contains($productCategory)) {
            $this->productCategories->removeElement($productCategory);
            // set the owning side to null (unless already changed)
            if ($productCategory->getProductId() === $this) {
                $productCategory->setProductId(null);
            }
        }

        return $this;
    }

}
