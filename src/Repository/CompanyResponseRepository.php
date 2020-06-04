<?php

namespace App\Repository;

use App\Entity\CompanyResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyResponse[]    findAll()
 * @method CompanyResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyResponse::class);
    }

    // /**
    //  * @return CompanyResponse[] Returns an array of CompanyResponse objects
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
    public function findOneBySomeField($value): ?CompanyResponse
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
