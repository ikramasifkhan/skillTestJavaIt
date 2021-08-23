<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeesRequest;
use App\Models\Fees;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['feeses'] = Fees::all();
        // return view('fees.index', $data);

        $feeses = Fees::latest();
        if (\request()->ajax()) {
            return DataTables::of($feeses)
                ->addIndexColumn()
                ->addColumn('status', function ($fees) {
                    // $status =$fees->status;
                    return $fees->status;
                })
                ->addColumn('action', function ($fees) {
                    return 'ok';
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
        Fees::create($request->all());
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
        $data['fees'] = Fees::findOrFail($id);

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
        $fees = Fees::findOrFail($id);
        $fees->update($request->all());
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
        $fees = Fees::findOrFail($id);
        $fees->delete();

        return successRedirect('Data is removed', 'fees.index');
    }

    public function activeInactive($id)
    {
        $fees = Fees::findOrFail($id);
        return activeInactiveChange($fees);
    }
}
