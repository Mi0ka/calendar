<?php

namespace App\Repository;

use App\Entity\HeureFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HeureFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeureFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeureFormation[]    findAll()
 * @method HeureFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeureFormationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HeureFormation::class);
    }

    // /**
    //  * @return HeureFormation[] Returns an array of HeureFormation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HeureFormation
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
