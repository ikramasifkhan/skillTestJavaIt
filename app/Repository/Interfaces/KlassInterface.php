<?php

namespace App\Repository\Interfaces;

interface KlassInterface
{
    public function getLatestClass();
    public function getAllKlassList();
    public function createKlass(array $data);
    public function getAnIntence($klassId);
    public function updateKlass(array $data, $klassId);
    public function deleteKlass($klassId);
    public function changeStatusKlass($klassId);
}
