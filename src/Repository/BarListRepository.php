<?php

namespace App\Repository;

use App\Entity\BarList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BarList|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarList|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarList[]    findAll()
 * @method BarList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BarList::class);
    }

    // /**
    //  * @return BarList[] Returns an array of BarList objects
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
    public function findOneBySomeField($value): ?BarList
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
