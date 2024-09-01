<?php
namespace App\Interfaces;

use App\Entity\Barcodes;

interface BarcodesRepositoryInterface{
    public function findById(int $id):?Barcodes;

    public function findAllCodes():?Array;

    public function flushQuery():void;

    public function persistData(Barcodes $barcode);
}
