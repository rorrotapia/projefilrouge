<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="happyhours")
 * @ORM\Entity(repositoryClass="App\Repository\BarHappyHoursRepository")
 */
class BarHappyHours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BarList", inversedBy="barHappyHours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_bar;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $start_happy;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $end_happy;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $days;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBar(): ?BarList
    {
        return $this->id_bar;
    }

    public function setIdBar(?BarList $id_bar): self
    {
        $this->id_bar = $id_bar;

        return $this;
    }

    public function getStartHappy(): ?\DateTime
    {
        return $this->start_happy;
    }

    public function setStartHappy(?\DateTime $start_happy): self
    {
        $this->start_happy = $start_happy;

        return $this;
    }

    public function getEndHappy(): ?\DateTime
    {
        return $this->end_happy;
    }

    public function setEndHappy(?\DateTime $end_happy): self
    {
        $this->end_happy = $end_happy;

        return $this;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(string $days): self
    {
        $this->days = $days;

        return $this;
    }
}
