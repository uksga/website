<?php

namespace App\Repository;

use App\Entity\TrackablePage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TrackablePage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrackablePage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrackablePage[]    findAll()
 * @method TrackablePage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrackablePageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrackablePage::class);
    }

//    /**
//     * @return TrackablePage[] Returns an array of TrackablePage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TrackablePage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
