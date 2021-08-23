<?php

namespace App\Repository\Repo;

use App\Models\ClassSection;
use App\Repository\Interfaces\ClassSectionInterface;

class ClassSectionRepo implements ClassSectionInterface
{
    /**
     * getLatestSection
     *
     * @return void
     */
    public function getLatestSection()
    {
        return ClassSection::latest();
    }

    /**
     * createSection
     *
     * @param  mixed $data
     * @return void
     */
    public function createSection(array $data)
    {
        return ClassSection::create($data);
    }
    public function getAnAnInstance($sectionId)
    {
        return ClassSection::findOrFail($sectionId);
    }

    /**
     * updateSection
     *
     * @param  mixed $data
     * @param  mixed $sectionId
     * @return void
     */
    public function updateSection($data, $sectionId)
    {
        $section = $this->getAnAnInstance($sectionId);
        return $section->update($data);
    }

    /**
     * deleteSection
     *
     * @param  mixed $sectionId
     * @return void
     */
    public function deleteSection($sectionId)
    {
        $section = $this->getAnAnInstance($sectionId);
        return $section->delete();
    }
    public function changeStatusSection($sectionId)
    {
        $section = $this->getAnAnInstance($sectionId);
        return activeInactiveChange($section, 'section.index');
    }
}
