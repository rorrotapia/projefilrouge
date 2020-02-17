<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BarV2
 *
 * @ORM\Table(name="bar_v2")
 * @ORM\Entity
 */
class BarV2
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="price_level", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $priceLevel = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rating", type="decimal", precision=20, scale=1, nullable=true, options={"default"="NULL"})
     */
    private $rating = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $city = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="cp", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $cp = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $address = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $lat = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="lon", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $lon = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="metro", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $metro = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_normal", type="decimal", precision=20, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $priceNormal = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_happy", type="decimal", precision=20, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $priceHappy = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="terrace", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $terrace = 'NULL';
    
}
