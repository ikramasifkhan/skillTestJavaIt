<?php

namespace App\Repository\Repo;

use App\Models\Fees;
use App\Repository\Interfaces\FeesInterface;

class FeesRepository implements FeesInterface
{
    public function getAllFees(){
        return Fees::latest();
    }
    public function createFees($data){
        return Fees::create($data);
    }

    public function getAnIntence($feesId){
        return Fees::findOrFail($feesId);
    }
    public function updateFees($data, $feesId){
        $fees = $this->getAnIntence($feesId);
        return $fees->update($data);
    }
    public function deleteFees($feesId){
        $fees = $this->getAnIntence($feesId);
        $fees->delete();
    }
    public function changeStatusFees($feesId){
        $fees = $this->getAnIntence($feesId);
        return activeInactiveChange($fees, 'fees.index');
    }
}
