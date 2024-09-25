<?php

namespace App\Repository;

use App\Entity\Barcodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Interfaces\BarcodesRepositoryInterface;

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

        public function findAllCodes(): ?Array
        {
            return $this->findAll();
        }

        public function flushQuery(): void
        {
            $this->getEntityManager()->flush();
        }

        public function persistData(Barcodes $barcode)
        {
            return $this->getEntityManager()->persist($barcode);
            
        }
   
}
