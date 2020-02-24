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

    // /**
    //  * @return BarHappyHours[] Returns an array of BarHappyHours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BarHappyHours
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
