<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="openhours")
 * @ORM\Entity(repositoryClass="App\Repository\BarOpenHoursRepository")
 */
class BarOpenHours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BarList", inversedBy="barOpenHours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_bar;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_hour;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_hour;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
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

    public function getStartHour(): ?\DateTime
    {
        return $this->start_hour;
    }

    public function setStartHour(\DateTime $start_hour): self
    {
        $this->start_hour = $start_hour;

        return $this;
    }

    public function getEndHour(): ?\DateTime
    {
        return $this->end_hour;
    }

    public function setEndHour(\DateTime $end_hour): self
    {
        $this->end_hour = $end_hour;

        return $this;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(?string $days): self
    {
        $this->days = $days;

        return $this;
    }
}
