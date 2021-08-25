<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\ClassSectionInterface;
use App\Repository\Interfaces\GroupInterface;
use App\Repository\Interfaces\KlassInterface;
use App\Repository\Interfaces\StudentInterface;
use PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    protected $studentRepo;
    protected $classRepo;
    protected $groupRepo;
    protected $sectionRepo;

    public function __construct(StudentInterface $studentInterface, KlassInterface $klassInterface, GroupInterface $groupInterface, ClassSectionInterface $sectionInterface)
    {
        $this->studentRepo = $studentInterface;
        $this->classRepo = $klassInterface;
        $this->groupRepo = $groupInterface;
        $this->sectionRepo = $sectionInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepo->getLatestStudentList();
        if (\request()->ajax()) {
            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('full_name', function ($student) {
                    return $student->first_name.' '.$student->last_name;
                })
                ->addColumn('status', function ($student) {
                    return showStatus($student->status);
                })
                ->addColumn('action', function ($student) {
                    return view('student.actionColumn', compact('student'));
                })
                ->rawColumns(['full_name','status', 'action'])
                ->tojson();
        }
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['classes']=$this->classRepo->getAllKlassList();
        $data['groups']=$this->groupRepo->getAllGroupList();
        $data['sections']=$this->sectionRepo->getAllSection();
        return view('student.add',$data);
    }

    protected function studentCommonInfo($request){
        return [
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'gender'=> $request->gender ,
            'birth_date'=> $request->birth_date ,
            'present_address'=> $request->present_address ,
            'sms_no'=> $request->sms_no,
            'session'=> $request->session_year,
            'year'=> $request->year,
            'klass_id'=> $request->class_id,
            'group_id'=> $request->group_id,
            'section_id'=> $request->section_id,
            'roll'=> $request->roll
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->studentCommonInfo($request);
        $this->studentRepo->createStudent($data);
        return successRedirect('Student added successfully', 'student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['student'] = $this->studentRepo->getAnIntence($id);
        return view('student.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['student'] = $this->studentRepo->getAnIntence($id);
        $data['classes']=$this->classRepo->getAllKlassList();
        $data['groups']=$this->groupRepo->getAllGroupList();
        $data['sections']=$this->sectionRepo->getAllSection();

        return view('student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->studentCommonInfo($request);
        $this->studentRepo->updateStudent($data, $id);

        return successRedirect('Info updated successfully', 'student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentRepo->deleteStudent($id);
        return successRedirect('Data is removed', 'student.index');
    }

    public function activeInactive($id){
        return $this->studentRepo->changeStudentStatus($id);
    }

    public function print(Request $request){
         $students = $this->studentRepo->getAllStudent();
         $pdf = PDF::loadView('student.print', compact('students'));
         return $pdf->stream('document.pdf');
    }
}
