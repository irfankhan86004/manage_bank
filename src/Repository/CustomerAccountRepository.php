<?php

namespace App\Repository;

use App\Entity\CustomerAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerAccount[]    findAll()
 * @method CustomerAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerAccount::class);
    }

    // /**
    //  * @return CustomerAccount[] Returns an array of CustomerAccount objects
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
    public function findOneBySomeField($value): ?CustomerAccount
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
