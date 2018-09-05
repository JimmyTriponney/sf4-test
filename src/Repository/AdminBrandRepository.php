<?php

namespace App\Repository;

use App\Entity\AdminBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AdminBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminBrand[]    findAll()
 * @method AdminBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminBrandRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AdminBrand::class);
    }

//    /**
//     * @return AdminBrand[] Returns an array of AdminBrand objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdminBrand
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
