<?php

namespace App\Repository;

use App\Entity\PriceMsc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class PriceMscRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceMsc::class);
    }

    public function clearTable(): void
    {
        $this->createQueryBuilder('p')
            ->delete()
            ->getQuery()
            ->execute();
    }
}
