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
class v2 extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BarOpenHours::class);
    }

    public function findBarsGeo(...$params): array
    {
        $params = [
            'latstart' => $params[0],
            'lonstart' => $params[1],
            'limitkm' => (isset($params[2])) ? $params[2] * 1000 : 10000,
            'terrace' => (isset($params[3])) ? $params[3] : "0,1",
            'day' =>  "%" . $params[4] . "%",
            'starthour' => (isset($params[5])) ? $params[5] : "00:00",
            'openAfter' => (isset($params[6])) ? $params[6] : "23:00",
            'price' => (isset($params[7])) ? $params[7] : 99,
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
            ->andWhere("o.end_hour <= :openAfter")
            ->andWhere("o.start_hour >= :starthour")
            ->andWhere("b.terrace IN (:terrace)")
            ->andWhere("b.price_normal <= :price")
            ->andWhere("h.days LIKE :day")
            ->setParameters($params)
            ->setMaxResults(20)
            ->getQuery();


        return $qb->execute();
    }
}
