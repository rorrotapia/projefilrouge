<?php

namespace App\Repository;

use Doctrine\ORM\Query\Expr;
use App\Entity\SportsList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SportsList|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportsList|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportsList[]    findAll()
 * @method SportsList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportsListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SportsList::class);
    }

   
    public function findSports($params) : array
    {
        $qb =  $this->createQueryBuilder('e')
            ->select()
            ->where("e.nom IN (:sports)")
            ->andWhere("e.date = :date")
            ->setParameters($params)
            ->getQuery();

        return $qb->execute();
    }
}
