<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Repository\Interfaces\GroupInterface;
use App\Repository\Interfaces\KlassInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GroupController extends Controller
{
    protected $groupRepo;
    protected $klassRepo;

    public function __construct(GroupInterface $groupInterface, KlassInterface $klassInterface)
    {
        $this->groupRepo = $groupInterface;
        $this->klassRepo = $klassInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->groupRepo->getLatestGroup();
        if (\request()->ajax()) {
            return DataTables::of($groups)
                ->addIndexColumn()
                ->addColumn('status', function ($group) {
                    return showStatus($group->status);
                })
                ->addColumn('action', function ($group) {
                    return view('group.actionColumn', compact('group'));
                })
                ->rawColumns(['name', 'status', 'action'])
                ->tojson();
        }
        return view('group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $this->groupRepo->createGroup($data);
        return successRedirect('Info added successfully', 'group.index');
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
        $data['group'] = $this->groupRepo->getAnIntance($id);
        $data['classes'] = $this->klassRepo->getAllKlassList();
        return view('group.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $this->groupRepo->updateGroup($data, $request->id);

        return successRedirect('Info update successfully', 'group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->groupRepo->deleteGroup($id);

        return successRedirect('Data is removed', 'group.index');
    }

    public function activeInactive($id)
    {
        return $this->groupRepo->changeStatusGroup($id);
    }
}
