<?php

namespace App\Repository;

use App\Entity\InvolvementContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InvolvementContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvolvementContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvolvementContact[]    findAll()
 * @method InvolvementContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvolvementContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvolvementContact::class);
    }

//    /**
//     * @return InvolvementContact[] Returns an array of InvolvementContact objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InvolvementContact
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
