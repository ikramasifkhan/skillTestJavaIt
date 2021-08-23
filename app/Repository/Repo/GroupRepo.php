<?php

namespace App\Repository\Repo;

use App\Models\Fees;
use App\Models\Group;
use App\Repository\Interfaces\GroupInterface;

class GroupRepo implements GroupInterface
{
    /**
     * getLatestGroup
     *
     * @return void
     */
    public function getLatestGroup()
    {
        return Group::latest();
    }

    /**
     * getAllGroupList
     *
     * @return void
     */
    public function getAllGroupList(){
        return Group::all();
    }

    /**
     * createGroup
     *
     * @param  mixed $data
     * @return void
     */
    public function createGroup($data)
    {
        return Group::create($data);
    }

    /**
     * getAnIntance
     *
     * @param  mixed $groupId
     * @return void
     */
    public function getAnIntance($groupId)
    {
        return Group::findOrFail($groupId);
    }

    /**
     * updateGroup
     *
     * @param  mixed $data
     * @param  mixed $groupId
     * @return void
     */
    public function updateGroup($data, $groupId)
    {
        $group = $this->getAnIntance($groupId);
        return $group->update($data);
    }

    /**
     * deleteGroup
     *
     * @param  mixed $groupId
     * @return void
     */
    public function deleteGroup($groupId)
    {
        $klass = $this->getAnIntance($groupId);
        $klass->delete();
    }

    /**
     * changeStatusGroup
     *
     * @param  mixed $groupId
     * @return void
     */
    public function changeStatusGroup($groupId)
    {
        $group = $this->getAnIntance($groupId);
        return activeInactiveChange($group, 'group.index');
    }
}
