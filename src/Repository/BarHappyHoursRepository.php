<?php

namespace App\Repository;

use App\Entity\BarHappyHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BarHappyHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarHappyHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarHappyHours[]    findAll()
 * @method BarHappyHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarHappyHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BarHappyHours::class);
    }

}
