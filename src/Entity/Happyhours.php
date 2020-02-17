<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Happyhours
 *
 * @ORM\Table(name="happyhours", indexes={@ORM\Index(name="id_bar", columns={"id_bar"})})
 * @ORM\Entity
 */
class Happyhours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="happy_start", type="time", nullable=true, options={"default"="NULL"})
     */
    private $happyStart = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="happy_end", type="time", nullable=true, options={"default"="NULL"})
     */
    private $happyEnd = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="days", type="string", length=11, nullable=true, options={"default"="NULL"})
     */
    private $days = 'NULL';

    /**
     * @var \BarV2
     *
     * @ORM\ManyToOne(targetEntity="BarV2")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bar", referencedColumnName="id")
     * })
     */
    private $idBar;


}
