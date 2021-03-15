<?php

namespace App\Repository;

use App\Entity\CvImpload;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CvImpload|null find($id, $lockMode = null, $lockVersion = null)
 * @method CvImpload|null findOneBy(array $criteria, array $orderBy = null)
 * @method CvImpload[]    findAll()
 * @method CvImpload[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CvImploadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CvImpload::class);
    }

    // /**
    //  * @return CvImpload[] Returns an array of CvImpload objects
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
    public function findOneBySomeField($value): ?CvImpload
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
