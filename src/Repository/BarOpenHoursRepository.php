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

    public function findBars(...$params) : array
    {
        $params = [
            'latstart' => $params[0],
            'lonstart' => $params[1],
            'limitkm' => $params[2]*1000,
            'terrace' => $params[3],
            'day' => "%".$params[4]."%",
            'currentime' => $params[5],
        ];

        $qb =  $this->createQueryBuilder('h')
            ->addSelect('b')
            ->select("
                b.id,
                b.name,
                b.lat,
                b.lon,
                b.price_normal,
                b.price_happy,
                b.terrace,
                h.start_hour,
                h.end_hour,
                h.days,
                SQRT(POWER(69.1 * (b.lat - :latstart  ), 2) + POWER(69.1 * ( :lonstart - b.lon) * COS(b.lat / 57.3), 2)) * 1.609344 AS distance")
            ->leftJoin('App\Entity\BarList', 'b',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->having("distance <= :limitkm")
            ->where("h.days LIKE :day")
            ->andWhere("h.end_hour <= :currentime")
            ->andWhere("b.terrace = :terrace")
            ->setParameters($params)
            ->setMaxResults(20)
            ->getQuery();

        return $qb->execute();
    }

    public function findbyBar(...$params) : array
    {
        $params = [
            'id' => $params[0],
            'day' => "%".$params[1]."%"
        ];

        $qb =  $this->createQueryBuilder('h')
            ->addSelect('b')
            ->select("
                b.id,
                b.name,
                b.city,
                b.address,
                b.cp,
                b.lat,
                b.lon,
                b.price_normal,
                b.price_happy,
                b.terrace,
                h.start_hour,
                h.end_hour"
              )
            ->leftJoin('App\Entity\BarList', 'b',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("b.id = :id")
            ->andWhere("h.days LIKE :day")
            ->setParameters($params)
            ->setMaxResults(20)
            ->getQuery();

        return $qb->execute();
    }

    // /**
    //  * @return BarOpenHours[] Returns an array of BarOpenHours objects
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
    public function findOneBySomeField($value): ?BarOpenHours
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
