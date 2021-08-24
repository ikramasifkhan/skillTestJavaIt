<?php

namespace App\Repository\Repo;

use App\Models\Student;
use App\Repository\Interfaces\StudentInterface;

class StudentRepo implements StudentInterface
{
    public function getLatestStudentList(){
        return Student::with(['klass', 'group', 'section'])
            ->whereHas('klass', function ($query){
                $query->where('status', 'active');
            })
            ->whereHas('group', function ($query){
                $query->where('status', 'active');
            })
            ->whereHas('section', function ($query){
                $query->where('status', 'active');
            })
            ->get();
    }
    public function getAnIntence($studentId){
      return Student::with('klass', 'group', 'section')->findOrFail($studentId);
    }
    public function createStudent($data){
        return Student::create($data);
    }
    public function updateStudent($data, $studentId){
        $student = $this->getAnIntence($studentId);
        $student->update($data);
    }

    public function deleteStudent($studentId)
    {
        $klass = $this->getAnIntence($studentId);
        $klass->delete();
    }
    public function changeStudentStatus($studentId){
        $student = $this->getAnIntence($studentId);
        return activeInactiveChange($student, 'student.index');
    }
}
