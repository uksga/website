<?php

namespace App\Repository;

use App\Entity\MeetingRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MeetingRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeetingRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeetingRecord[]    findAll()
 * @method MeetingRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeetingRecordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeetingRecord::class);
    }

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
