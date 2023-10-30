<?php

namespace App\Repository;

use App\Entity\Makes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class MakesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Makes::class);
    }
    public function getAllGoodByNames(array $names): array
    {
        return $this->findBy(['makeName' => $names, 'publish' => 1]);
    }
}
