<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Openhours
 *
 * @ORM\Table(name="openhours")
 * @ORM\Entity
 */
class Openhours
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
     * @var int
     *
     * @ORM\Column(name="id_bar", type="integer", nullable=false)
     */
    private $idBar;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="hours_start", type="time", nullable=true, options={"default"="NULL"})
     */
    private $hoursStart = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="hours_end", type="time", nullable=true, options={"default"="NULL"})
     */
    private $hoursEnd = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="days", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $days = 'NULL';


}
