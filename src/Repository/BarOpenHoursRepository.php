<?php

namespace App\Repository;

use Doctrine\ORM\Query\Expr;
use App\Entity\BarOpenHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BarOpenHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarOpenHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarOpenHours[]    findAll()
 * @method BarOpenHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarOpenHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BarOpenHours::class);
    }
}
