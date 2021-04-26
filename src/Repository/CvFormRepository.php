<?php

namespace App\Repository;

use App\Entity\CvForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CvForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method CvForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method CvForm[]    findAll()
 * @method CvForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CvFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CvForm::class);
    }

    // /**
    //  * @return CvForm[] Returns an array of CvForm objects
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
    public function findOneBySomeField($value): ?CvForm
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
