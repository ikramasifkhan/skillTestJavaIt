<?php

namespace App\Repository\Repo;

use App\Models\Klass;
use App\Repository\Interfaces\KlassInterface;

class KlassRepo implements KlassInterface
{
    public function getAllKlass(){
        return Klass::latest();
    }
    public function createKlass($data){
        return Klass::create($data);
    }

    public function getAnIntence($feesId){
        return Klass::findOrFail($feesId);
    }
    public function updateKlass($data, $feesId){
        $fees = $this->getAnIntence($feesId);
        return $fees->update($data);
    }
    public function deleteKlass($feesId){
        $fees = $this->getAnIntence($feesId);
        $fees->delete();
    }
    public function changeStatusKlass($feesId){
        $fees = $this->getAnIntence($feesId);
        return activeInactiveChange($fees);
    }
}
