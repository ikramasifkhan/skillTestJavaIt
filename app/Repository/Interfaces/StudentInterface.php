<?php

namespace App\Repository\Interfaces;

interface StudentInterface
{
    public function getLatestStudentList();
    public function getAllStudent();
    public function getAnIntence($studentId);
    public function createStudent(array $data);
    public function updateStudent(array $data, $studentId);
    public function deleteStudent($studentId);
    public function changeStudentStatus($studentId);
}
