<?php

namespace App\Repository\Interfaces;

interface ClassSectionInterface
{
    /**
     * getLatestSection
     *
     * @return void
     */
    public function getLatestSection();

    /**
     * getAllSection
     *
     * @return void
     */
    public function getAllSection();

    /**
     * createSection
     *
     * @param  mixed $data
     * @return void
     */
    public function createSection(array $data);

    /**
     * getAnInSection
     *
     * @param  mixed $sectionId
     * @return void
     */
    public function getAnAnInstance($sectionId);

    /**
     * updateSection
     *
     * @param  mixed $data
     * @param  mixed $sectionId
     * @return void
     */
    public function updateSection(array $data, $sectionId);

    /**
     * deleteSection
     *
     * @param  mixed $sectionId
     * @return void
     */
    public function deleteSection($sectionId);

    /**
     * changeStatusSection
     *
     * @param  mixed $sectionId
     * @return void
     */
    public function changeStatusSection($sectionId);

}
