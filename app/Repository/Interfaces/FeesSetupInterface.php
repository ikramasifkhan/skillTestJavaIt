<?php

namespace App\Repository\Interfaces;

interface FeesSetupInterface{
    /**
     * getLatestSetupFees
     *
     * @return void
     */
    public function getLatestSetupFees();

    /**
     * getAllSetupFees
     *
     * @return void
     */
    public function getAllSetupFees();


    /**
     * createSetupFees
     *
     * @param  mixed $data
     * @return void
     */
    public function createSetupFees(array $data);

    /**
     * getAnIntence
     *
     * @param  mixed $setupFeesId
     * @return void
     */
    public function getAnIntence($setupFeesId);

    /**
     * updateSetupFees
     *
     * @param  mixed $data
     * @param  mixed $setUpFeesId
     * @return void
     */
    public function updateSetupFees(array $data, $setUpFeesId);

    /**
     * deleteSetupFees
     *
     * @param  mixed $setUpFeesId
     * @return void
     */
    public function deleteSetupFees($setUpFeesId);

    /**
     * changeStatusSetupFees
     *
     * @param  mixed $setUpFeesId
     * @return void
     */
    public function changeFeesSetupStatus($setUpFeesId);
}
