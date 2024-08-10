<?php

namespace App\Repository;

use App\Entity\Barcodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Barcodes>
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 */
class BarcodesRepository extends ServiceEntityRepository implements BarcodesRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Barcodes::class);
    }

        public function findById(int $id): ?Barcodes
        {
            return $this->find($id);
        }

        public function findAllCodes(): ?Barcodes
        {
            return $this->toArray()->findAll();
        }

        public function flushQuery(): ?Barcodes
        {
            return $this->flush();
        }
   
}
