<?php

namespace App\Repository;

use App\Entity\MeetingRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MeetingRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeetingRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeetingRecord[]    findAll()
 * @method MeetingRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeetingRecordRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MeetingRecord::class);
    }

//    /**
//     * @return MeetingRecord[] Returns an array of MeetingRecord objects
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
    public function findOneBySomeField($value): ?MeetingRecord
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
