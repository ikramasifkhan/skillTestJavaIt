<?php

namespace App\Repository\Interfaces;

interface GroupInterface{
    public function getLatestGroup();
    public function getAllGroupList();
    public function createGroup(array $data);
    public function getAnIntance($groupId);
    public function updateGroup(array $data, $groupId);
    public function deleteGroup($groupId);
    public function changeStatusGroup($groupId);
}
