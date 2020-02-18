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

    public function findAllBars() {

        $qb =  $this->createQueryBuilder('b')
            ->select("b.id,b.name,b.price_level,b.rating,b.city,b.cp,b.address,b.lat,b.lon,b.metro,b.price_normal,b.price_happy,b.terrace")
            ->getQuery();

        return $qb->execute();

    }

    public function findNearbyBars(float $geolat,float $geolon,int $limitkm) : array
    {
        $limitkm = $limitkm*1000;
        $qb =  $this->createQueryBuilder('b')
            ->select("b.id,b.name,b.price_level,b.rating,b.city,b.cp,b.address,b.lat,b.lon,b.metro,b.price_normal,b.price_happy,b.terrace,
            SQRT(POWER(69.1 * (b.lat - :latstart  ), 2) + POWER(69.1 * ( :lonstart - b.lon) * COS(b.lat / 57.3), 2)) * 1.609344 AS distance")
            ->having("distance <= :limitkm")

            ->setMaxResults(20)
            ->setParameter( 'latstart',$geolat)
            ->setParameter( 'lonstart',$geolon)
            ->setParameter( 'limitkm',$limitkm)
            ->getQuery();

        return $qb->execute();
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
