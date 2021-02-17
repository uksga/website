<?php

namespace App\Repository;

use App\Entity\ManagingEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ManagingEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManagingEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManagingEntity[]    findAll()
 * @method ManagingEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagingEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManagingEntity::class);
    }

}
