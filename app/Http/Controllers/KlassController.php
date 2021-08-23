<?php

namespace App\Http\Controllers;

use App\Http\Requests\KlassRequest;
use App\Repository\Interfaces\KlassInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KlassController extends Controller
{
    protected $classRepo;

    public function __construct(KlassInterface $klassInterface)
    {
        $this->classRepo = $klassInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $classes = $this->classRepo->getAllKlass();
        if (\request()->ajax()) {
            return DataTables::of($classes)
                ->addIndexColumn()
                ->addColumn('status', function ($class) {
                    return showStatus($class->status);
                })
                ->addColumn('action', function ($class) {
                    return view('klass.actionColumn', compact('class'));
                })
                ->rawColumns(['status', 'action'])
                ->tojson();
        }
        return view('klass.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klass.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KlassRequest $request)
    {
        $data = ['name'=>$request->name];
        $this->classRepo->createKlass($data);
        return successRedirect('Class added successfully', 'class.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['class'] = $this->classRepo->getAnIntence($id);
        return view('klass.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KlassRequest $request, $id)
    {
        $data = ['name'=>$request->name];
        $this->classRepo->updateKlass($data, $id);

        return successRedirect('Info update successfully', 'class.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->classRepo->deleteKlass($id);

        return successRedirect('Data is removed', 'class.index');
    }

    public function activeInactive($id)
    {
        return $this->classRepo->changeStatusKlass($id);
    }
}
