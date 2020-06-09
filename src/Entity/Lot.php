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
     * @ORM\Column(type="integer")
     */
    private $start_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $current_price;

    /**
     * @ORM\Column(type="integer")
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

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Bid::class, mappedBy="lot")
     */
    private $bids;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="lot")
     */
    private $comments;

//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $currency_id;
//
//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $measure_id;

    /**
     * @ORM\OneToMany(targetEntity=Response::class, mappedBy="lot")
     */
    private $responses;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="lots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Measure::class, inversedBy="lots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $measure;

    /**
     * @ORM\ManyToOne(targetEntity=Currency::class, inversedBy="lots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $currency;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->bids = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->responses = new ArrayCollection();
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

    public function getStartPrice(): ?int
    {
        return $this->start_price;
    }

    public function setStartPrice(int $start_price): self
    {
        $this->start_price = $start_price;

        return $this;
    }

    public function getCurrentPrice(): ?int
    {
        return $this->current_price;
    }

    public function setCurrentPrice(int $current_price): self
    {
        $this->current_price = $current_price;

        return $this;
    }

    public function getEndPrice(): ?int
    {
        return $this->end_price;
    }

    public function setEndPrice(int $end_price): self
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Bid[]
     */
    public function getBids(): Collection
    {
        return $this->bids;
    }

    public function addBid(Bid $bid): self
    {
        if (!$this->bids->contains($bid)) {
            $this->bids[] = $bid;
            $bid->setLot($this);
        }

        return $this;
    }

    public function removeBid(Bid $bid): self
    {
        if ($this->bids->contains($bid)) {
            $this->bids->removeElement($bid);
            // set the owning side to null (unless already changed)
            if ($bid->getLot() === $this) {
                $bid->setLot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setLot($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getLot() === $this) {
                $comment->setLot(null);
            }
        }

        return $this;
    }

//    public function getCurrencyId(): ?int
//    {
//        return $this->currency_id;
//    }
//
//    public function setCurrencyId(int $currency_id): self
//    {
//        $this->currency_id = $currency_id;
//
//        return $this;
//    }
//
//    public function getMeasureId(): ?int
//    {
//        return $this->measure_id;
//    }
//
//    public function setMeasureId(int $measure_id): self
//    {
//        $this->measure_id = $measure_id;
//
//        return $this;
//    }

    /**
     * @return Collection|Response[]
     */
    public function getResponses(): Collection
    {
        return $this->responses;
    }

    public function addResponse(Response $response): self
    {
        if (!$this->responses->contains($response)) {
            $this->responses[] = $response;
            $response->setLot($this);
        }

        return $this;
    }

    public function removeResponse(Response $response): self
    {
        if ($this->responses->contains($response)) {
            $this->responses->removeElement($response);
            // set the owning side to null (unless already changed)
            if ($response->getLot() === $this) {
                $response->setLot(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMeasure(): ?Measure
    {
        return $this->measure;
    }

    public function setMeasure(?Measure $measure): self
    {
        $this->measure = $measure;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}
