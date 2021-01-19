<?php

namespace App\Repository;

use App\Entity\CAtegorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CAtegorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method CAtegorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method CAtegorie[]    findAll()
 * @method CAtegorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CAtegorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CAtegorie::class);
    }

    // /**
    //  * @return CAtegorie[] Returns an array of CAtegorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CAtegorie
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
