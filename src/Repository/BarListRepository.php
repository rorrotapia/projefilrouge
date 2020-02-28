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

    public function findAllBars($params)
    {
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
                b.rating,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days,
                CASE WHEN h.start_happy < :currentTime THEN b.price_happy WHEN h.end_happy > :currentTime THEN b.price_happy ELSE b.price_normal END AS pricecurrent")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("o.days LIKE :day")
            ->setParameters($params)
            ->getQuery();

        return $qb->execute();
    }

    public function findAllOpenBars($params)
    {
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
                b.rating,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days,
                CASE WHEN h.start_happy < :currentTime THEN b.price_happy WHEN h.end_happy > :currentTime THEN b.price_happy ELSE b.price_normal END AS pricecurrent")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("o.days LIKE :day")
            ->andWhere("(o.start_hour < o.end_hour AND o.end_hour > :currentTime AND o.start_hour < :currentTime) OR (o.start_hour > o.end_hour AND (o.end_hour > :currentTime OR o.start_hour < :currentTime))")
            ->setParameters($params)
            ->getQuery();

        return $qb->execute();
    }

    public function findBars($params): array
    {
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
                b.rating,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days as days_happy,
                CASE WHEN h.start_happy < :currentTime THEN b.price_happy WHEN h.end_happy > :currentTime THEN b.price_happy ELSE b.price_normal END AS pricecurrent")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("o.days LIKE :day")
            ->andWhere("h.days LIKE :day")
            ->andWhere("(o.start_hour < o.end_hour AND o.end_hour > :currentTime AND o.start_hour < :currentTime) OR (o.start_hour > o.end_hour AND (o.end_hour > :currentTime OR o.start_hour < :currentTime))");
            if (isset($params['price'])) {
                $qb->having("pricecurrent < :price");}
            if (isset($params['terrace'])) {
                $qb->andWhere("b.terrace IN (:terrace)");}
            if (isset($params['openAfter'])) {
                $qb->andWhere("(o.start_hour < o.end_hour AND o.end_hour > :openAfter AND o.start_hour < :openAfter) OR (o.start_hour > o.end_hour AND (o.end_hour > :openAfter OR o.start_hour < :openAfter))");}
            if (isset($params['happyAfter'])) {
                $qb->andWhere("(h.start_happy < h.end_happy AND h.end_happy > :happyAfter AND h.start_happy < :happyAfter) OR (h.start_happy > h.end_happy AND (h.end_happy > :happyAfter OR h.start_happy < :happyAfter))");}
            $qb->setParameters($params);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findBarGeo($params,$limit = null): array
    {
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
                b.rating,
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days as days_happy,
                SQRT(POWER(69.1 * (b.lat - :lat  ), 2) + POWER(69.1 * ( :lon - b.lon) * COS(b.lat / 57.3), 2)) * 1.609344 AS distance
                ")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("o.days LIKE :day")
            ->andWhere("(o.start_hour < o.end_hour AND o.end_hour > :currentTime AND o.start_hour < :currentTime) OR (o.start_hour > o.end_hour AND (o.end_hour > :currentTime OR o.start_hour < :currentTime))")
            ->setParameters($params);
        if ($limit) {
            $qb->setMaxResults($limit);
        }
        $query = $qb->getQuery();

        return $query->execute();
    }
}
