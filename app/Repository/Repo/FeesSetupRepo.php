<?php

namespace App\Repository\Repo;

use App\Models\FeesSetup;
use App\Repository\Interfaces\FeesSetupInterface;

class FeesSetupRepo implements FeesSetupInterface{
    /**
     * getLatestSetupFees
     *
     * @return void
     */
    public function getLatestSetupFees(){
        return FeesSetup::with('klass', 'group', 'section', 'payment', 'fees')->get();
    }

    public function getAllSetupFees(){
        return FeesSetup::with('klass', 'group', 'section', 'payment', 'fees')->all();
    }
    public function createSetupFees($data){
        return FeesSetup::create($data);
    }
    public function getAnIntence($setupFeesId){
        return FeesSetup::findOrFail($setupFeesId);
    }
    public function updateSetupFees($data, $setUpFeesId){

    }
    public function deleteSetupFees($setUpFeesId){
        $feesSetup = $this->getAnIntence($setUpFeesId);
        $feesSetup->delete();
    }
    public function changeFeesSetupStatus($setUpFeesId){
        $feesSetup = $this->getAnIntence($setUpFeesId);
        return activeInactiveChange($feesSetup, 'fees-setup.index');
    }
}
