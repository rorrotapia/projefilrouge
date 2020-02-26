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

   
    public function findSports(...$params) : array
    {
        $wherein = explode(',',$params[1]);
    

        $params = [
            'date' => $params[0],
            'sports' => $wherein
        ];


        $qb =  $this->createQueryBuilder('b')
            ->select("
                b.id,
                b.nom,
                b.phase,
                b.horaire,
                b.lieu,
                b.date"
            )
            ->where("b.nom IN (:sports)")
            ->andWhere("b.date = :date")
            ->setParameters($params)
            ->setMaxResults(20)
            ->getQuery();

       
        return $qb->execute();
    }
}
