<?php

namespace App\Repository\Repo;

use App\Models\Klass;
use App\Repository\Interfaces\KlassInterface;
use Exception;

class KlassRepo implements KlassInterface
{
    public function getLatestClass()
    {
        return Klass::latest();
    }
    public function getAllKlassList()
    {
        return Klass::all();
    }
    public function createKlass($data)
    {

        return Klass::create($data);
    }

    public function getAnIntence($klassId)
    {
        return Klass::findOrFail($klassId);
    }
    public function updateKlass($data, $klassId)
    {
        $klass = $this->getAnIntence($klassId);
        return $klass->update($data);
    }
    public function deleteKlass($klassId)
    {
        $klass = $this->getAnIntence($klassId);
        $klass->delete();
    }
    public function changeStatusKlass($klassId)
    {
        $klass = $this->getAnIntence($klassId);
        return activeInactiveChange($klass, 'class.index');
    }
}
