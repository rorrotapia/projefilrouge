<?php

namespace App\Repository;

use Doctrine\ORM\Query\Expr;
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

    public function findAllBars(...$params) {

        $params = [
            'day' =>  "%".$params[0]."%"
        ];

        $qb =  $this->createQueryBuilder('b')
            ->addSelect('o')
            ->addSelect('h')
            ->select("
                b.id,
                b.name,
                b.city,
                b.cp,
                b.address,
                b.metro,
                b.lat,
                b.lon,
                b.price_normal,
                b.price_happy,
                b.terrace,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("o.days LIKE :day")
            ->setParameters($params)
            ->getQuery();

        return $qb->execute();
    }

    public function findAllOpenBars(...$params) {

        $params = [
            'day' =>  "%".$params[0]."%",
            'currentTime' => $params[1],
        ];

        $qb =  $this->createQueryBuilder('b')
            ->addSelect('o')
            ->addSelect('h')
            ->select("
                b.id,
                b.name,
                b.city,
                b.cp,
                b.address,
                b.metro,
                b.lat,
                b.lon,
                b.price_normal,
                b.price_happy,
                b.terrace,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            // ->where("o.days LIKE :day")
            ->andWhere("(o.start_hour < o.end_hour AND o.end_hour > :currentTime AND o.start_hour < :currentTime) OR (o.start_hour > o.end_hour AND (o.end_hour > :currentTime OR o.start_hour < :currentTime))")
            ->setParameters($params)
            ->getQuery();

        return $qb->execute();
    }

    public function findBarsGeo(...$params) : array
    {
        $params = [
            'latstart' => $params[0],
            'lonstart' => $params[1],
            'limitkm' => (isset($params[2])) ? $params[2]*1000 : 10000,
            'terrace' => (isset($params[3])) ? $params[3] : "0,1",
            'day' =>  "%".$params[4]."%",
            'starthour' => (isset( $params[5])) ? $params[5] : "00:00",
            'endhour' => (isset( $params[6])) ? $params[6] : "23:00",
            'price' => (isset($params[7])) ? $params[7] : 99 ,
        ];

        $qb =  $this->createQueryBuilder('b')
            ->addSelect('o')
            ->addSelect('h')
            ->select("
                b.id,
                b.name,
                b.city,
                b.cp,
                b.address,
                b.metro,
                b.lat,
                b.lon,
                b.price_normal,
                b.price_happy,
                b.terrace,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days,
                SQRT(POWER(69.1 * (b.lat - :latstart  ), 2) + POWER(69.1 * ( :lonstart - b.lon) * COS(b.lat / 57.3), 2)) * 1.609344 AS distance")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->having("distance <= :limitkm")
            ->where("o.days LIKE :day")
            ->andWhere("o.end_hour <= :endhour")
            ->andWhere("o.start_hour >= :starthour")
            ->andWhere("b.terrace IN (:terrace)")
            ->andWhere("b.price_normal <= :price")
            ->andWhere("h.days LIKE :day")
            ->setParameters($params)
            ->setMaxResults(20)
            ->getQuery();


        return $qb->execute();
    }

    public function findBars(...$params) : array
    {
        $params = [
            'terrace' => (isset($params[0])) ? $params[0] : "0,1",
            'day' =>  "%".$params[1]."%",
            'starthour' => (isset( $params[2])) ? $params[2] : "23:00",
            'price' => (isset($params[3])) ? $params[3] : 99,
            'starthappy' => (isset( $params[4])) ? $params[4] : "23:00",
        ];

        $qb =  $this->createQueryBuilder('b')
            ->addSelect('o')
            ->addSelect('h')
            ->select("
                b.id,
                b.name,
                b.city,
                b.cp,
                b.address,
                b.metro,
                b.lat,
                b.lon,
                b.price_normal,
                b.price_happy,
                b.terrace,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days as days_happy")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("o.days LIKE :day")
            ->andWhere("o.start_hour <= :starthour")
            ->andWhere("b.terrace IN (:terrace)")
            ->andWhere("b.price_normal <= :price")
            ->andWhere("h.start_happy <= :starthappy")
            ->andWhere("h.days LIKE :day")
            ->setParameters($params)
            ->setMaxResults(20)
            ->getQuery();

        return $qb->execute();
    }

    public function findBarById(...$params) : array
    {
        $params = [
            'id' => $params[0],
            'day' => "%".$params[1]."%"
        ];

        $qb =  $this->createQueryBuilder('b')
            ->addSelect('o')
            ->select("
                b.id,
                b.name,
                b.city,
                b.address,
                b.cp,
                b.price_normal,
                b.price_happy,
                b.terrace,
                o.start_hour,
                o.end_hour"
            )
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->where("b.id = :id")
            ->andWhere("h.days LIKE :day")
            ->setParameters($params)
            ->setMaxResults(20)
            ->getQuery();

        return $qb->execute();
    }

}
