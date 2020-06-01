<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotRepository::class)
 */
class Lot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $placement_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expiration_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $start_price;

    /**
     * @ORM\Column(type="float")
     */
    private $current_price;

    /**
     * @ORM\Column(type="float")
     */
    private $end_price;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="lot")
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity=Subcategory::class, inversedBy="lots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subcategory;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPlacementDate(): ?\DateTimeInterface
    {
        return $this->placement_date;
    }

    public function setPlacementDate(\DateTimeInterface $placement_date): self
    {
        $this->placement_date = $placement_date;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(\DateTimeInterface $expiration_date): self
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getStartPrice(): ?float
    {
        return $this->start_price;
    }

    public function setStartPrice(float $start_price): self
    {
        $this->start_price = $start_price;

        return $this;
    }

    public function getCurrentPrice(): ?float
    {
        return $this->current_price;
    }

    public function setCurrentPrice(float $current_price): self
    {
        $this->current_price = $current_price;

        return $this;
    }

    public function getEndPrice(): ?float
    {
        return $this->end_price;
    }

    public function setEndPrice(float $end_price): self
    {
        $this->end_price = $end_price;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setLot($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getLot() === $this) {
                $image->setLot(null);
            }
        }

        return $this;
    }

    public function getSubcategory(): ?Subcategory
    {
        return $this->subcategory;
    }

    public function setSubcategory(?Subcategory $subcategory): self
    {
        $this->subcategory = $subcategory;

        return $this;
    }
}
