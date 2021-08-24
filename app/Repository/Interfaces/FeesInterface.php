<?php

namespace App\Repository\Interfaces;

interface FeesInterface
{
    public function getLatestFees();
    public function getAllFees();
    public function createFees(array $data);
    public function getAnIntence($feesId);
    public function updateFees(array $data, $feesId);
    public function deleteFees($feesId);
    public function changeStatusFees($feesId);
}
