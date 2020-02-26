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
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days")
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
                o.start_hour,
                o.end_hour,
                o.days,
                h.start_happy,
                h.end_happy,
                h.days as days_happy")
            ->leftJoin('App\Entity\BarOpenHours', 'o',   Expr\Join::WITH,  'b.id = o.id_bar')
            ->leftJoin('App\Entity\BarHappyHours', 'h',   Expr\Join::WITH,  'b.id = h.id_bar')
            ->where("o.days LIKE :day")
            ->andWhere("h.days LIKE :day")
            // @TODO : currentPrice
            ->andWhere("b.price_normal <= :price OR b.price_happy <= :price")
            ->andWhere("b.terrace IN (:terrace)")
            ->andWhere("(o.start_hour < o.end_hour AND o.end_hour > :openAfter AND o.start_hour < :openAfter) OR (o.start_hour > o.end_hour AND (o.end_hour > :openAfter OR o.start_hour < :openAfter))")
            ->andWhere("(h.start_happy < h.end_happy AND h.end_happy > :happyAfter AND h.start_happy < :happyAfter) OR (h.start_happy > h.end_happy AND (h.end_happy > :happyAfter OR h.start_happy < :happyAfter))")
            ->setParameters($params)
            ->getQuery();

        return $qb->execute();
    }
}
