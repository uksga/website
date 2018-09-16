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

}
