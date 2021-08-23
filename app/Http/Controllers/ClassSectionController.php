<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassSectionRequest;
use App\Repository\Interfaces\ClassSectionInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClassSectionController extends Controller
{
    /**
     * sectionRepo
     *
     * @var mixed
     */
    protected $sectionRepo;

    /**
     * __construct
     *
     * @param  mixed $classSectionInterface
     * @return void
     */
    public function __construct(ClassSectionInterface $classSectionInterface)
    {
        $this->sectionRepo = $classSectionInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = $this->sectionRepo->getLatestSection();
        if (\request()->ajax()) {
            return DataTables::of($sections)
                ->addIndexColumn()
                ->addColumn('status', function ($section) {
                    return showStatus($section->status);
                })
                ->addColumn('action', function ($section) {
                    return view('section.actionColumn', compact('section'));
                })
                ->rawColumns(['status', 'action'])
                ->tojson();
        }
        return view('section.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('section.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassSectionRequest $request)
    {
        $data = ['name' => ucfirst($request->name)];
        $this->sectionRepo->createSection($data);
        return successRedirect('Section added successfully', 'section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $data['section'] = $this->sectionRepo->getAnAnInstance($id);
        return view('section.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassSectionRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $this->sectionRepo->updateSection($data, $request->id);

        return successRedirect('Info update successfully', 'section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sectionRepo->deleteSection($id);
        return successRedirect('Info removed successfully', 'section.index');
    }

    /**
     * activeInactive
     *
     * @param  mixed $id
     * @return void
     */
    public function activeInactive($id)
    {
       return $this->sectionRepo->changeStatusSection($id);
    }
}
