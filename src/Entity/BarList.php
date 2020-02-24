<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="bar_v2")
 * @ORM\Entity(repositoryClass="App\Repository\BarListRepository")
 */
class BarList
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
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price_level;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="float")
     */
    private $lat;

    /**
     * @ORM\Column(type="float")
     */
    private $lon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metro;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $price_normal;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $price_happy;

    /**
     * @ORM\Column(type="integer")
     */
    private $terrace;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BarOpenHours", mappedBy="id_bar")
     */
    private $barOpenHours;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BarHappyHours", mappedBy="id_bar")
     */
    private $barHappyHours;

    public function __construct()
    {
        $this->barOpenHours = new ArrayCollection();
        $this->barHappyHours = new ArrayCollection();
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

    public function getPriceLevel(): ?int
    {
        return $this->price_level;
    }

    public function setPriceLevel(?int $price_level): self
    {
        $this->price_level = $price_level;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(?string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getMetro(): ?string
    {
        return $this->metro;
    }

    public function setMetro(?string $metro): self
    {
        $this->metro = $metro;

        return $this;
    }

    public function getPriceNormal(): ?string
    {
        return $this->price_normal;
    }

    public function setPriceNormal(?string $price_normal): self
    {
        $this->price_normal = $price_normal;

        return $this;
    }

    public function getPriceHappy(): ?string
    {
        return $this->price_happy;
    }

    public function setPriceHappy(?string $price_happy): self
    {
        $this->price_happy = $price_happy;

        return $this;
    }

    public function getTerrace(): ?int
    {
        return $this->terrace;
    }

    public function setTerrace(int $terrace): self
    {
        $this->terrace = $terrace;

        return $this;
    }

    /**
     * @return Collection|BarOpenHours[]
     */
    public function getBarOpenHours(): Collection
    {
        return $this->barOpenHours;
    }

    public function addBarOpenHour(BarOpenHours $barOpenHour): self
    {
        if (!$this->barOpenHours->contains($barOpenHour)) {
            $this->barOpenHours[] = $barOpenHour;
            $barOpenHour->setIdBar($this);
        }

        return $this;
    }

    public function removeBarOpenHour(BarOpenHours $barOpenHour): self
    {
        if ($this->barOpenHours->contains($barOpenHour)) {
            $this->barOpenHours->removeElement($barOpenHour);
            // set the owning side to null (unless already changed)
            if ($barOpenHour->getIdBar() === $this) {
                $barOpenHour->setIdBar(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BarHappyHours[]
     */
    public function getBarHappyHours(): Collection
    {
        return $this->barHappyHours;
    }

    public function addBarHappyHour(BarHappyHours $barHappyHour): self
    {
        if (!$this->barHappyHours->contains($barHappyHour)) {
            $this->barHappyHours[] = $barHappyHour;
            $barHappyHour->setIdBar($this);
        }

        return $this;
    }

    public function removeBarHappyHour(BarHappyHours $barHappyHour): self
    {
        if ($this->barHappyHours->contains($barHappyHour)) {
            $this->barHappyHours->removeElement($barHappyHour);
            // set the owning side to null (unless already changed)
            if ($barHappyHour->getIdBar() === $this) {
                $barHappyHour->setIdBar(null);
            }
        }

        return $this;
    }
}
