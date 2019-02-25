<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"product"}})
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @Groups({"product"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $id;

    /**
     * @Groups({"product"})
     * @Groups("category")
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $code;

    /**
     * @Groups({"product"})
     * @Groups("category")
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $name;

    /**
     * @Groups({"product"})
     * @Groups("category")
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotNull
     */
    private $image;

    /**
     * @Groups({"product"})
     * @Groups("category")
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @Groups({"product"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="products")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
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
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

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
}
