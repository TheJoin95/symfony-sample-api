<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"get"}}, itemOperations={"get"})
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("get")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get")
     * @Assert\NotNull
     */
    private $name;

    /**
     * @Groups("get")
     * @ORM\OneToMany(targetEntity="App\Entity\ProductCategories", mappedBy="category_id")
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
            $productCategory->setCategoryId($this);
        }

        return $this;
    }

    public function removeProductCategory(ProductCategories $productCategory): self
    {
        if ($this->productCategories->contains($productCategory)) {
            $this->productCategories->removeElement($productCategory);
            // set the owning side to null (unless already changed)
            if ($productCategory->getCategoryId() === $this) {
                $productCategory->setCategoryId(null);
            }
        }

        return $this;
    }
}
