<?php

namespace App\Repository;

use App\Entity\ManagingEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ManagingEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManagingEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManagingEntity[]    findAll()
 * @method ManagingEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagingEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ManagingEntity::class);
    }

//    /**
//     * @return ManagingEntity[] Returns an array of ManagingEntity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ManagingEntity
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
