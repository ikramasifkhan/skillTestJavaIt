<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeesRequest;
use App\Models\Fees;
use App\Repository\Interfaces\FeesInterface;
use App\View\Components\ActionComponent;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class FeesController extends Controller
{
    protected $feesRepo;
    public function __construct(FeesInterface $feesInterface)
    {
        $this->feesRepo = $feesInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeses = $this->feesRepo->getAllFees();
        if (\request()->ajax()) {
            return DataTables::of($feeses)
                ->addIndexColumn()
                ->addColumn('status', function ($fees) {
                    // $status =$fees->status;
                    // return ;
                    return showStatus($fees->status);
                })
                ->addColumn('action', function ($fees) {
                    return view('fees.actionColumn', compact('fees'));
                })
                ->rawColumns(['status', 'action'])
                ->tojson();
        }
        return view('fees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeesRequest $request)
    {
        $data= [
           'name'=> $request->name,
        ];
        $this->feesRepo->createFees($data);
        return successRedirect('Fees added successfully', 'fees.index');
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
        $data['fees'] = $this->feesRepo->getAnIntence($id);
        return view('fees.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeesRequest $request, $id)
    {
        $data = ['name'=>$request->name];
        $this->feesRepo->updateFees($data, $id);

        return successRedirect('Info update successfully', 'fees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->feesRepo->deleteFees($id);

        return successRedirect('Data is removed', 'fees.index');
    }

    public function activeInactive($id)
    {
        return $this->feesRepo->changeStatusFees($id);
    }
}
