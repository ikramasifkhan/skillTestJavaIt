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

    public function getAnIntence($klassId){
        return Klass::findOrFail($klassId);
    }
    public function updateKlass($data, $klassId){
        $fees = $this->getAnIntence($klassId);
        return $fees->update($data);
    }
    public function deleteKlass($klassId){
        $fees = $this->getAnIntence($klassId);
        $fees->delete();
    }
    public function changeStatusKlass($klassId){
        $fees = $this->getAnIntence($klassId);
        return activeInactiveChange($fees);
    }
}
