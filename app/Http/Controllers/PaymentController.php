<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Repository\Interfaces\PaymentInterface;
use App\Repository\Repo\PaymentRepo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    protected $paymentRepo;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(PaymentInterface $paymentInterface)
    {
        $this->paymentRepo = $paymentInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = $this->paymentRepo->getLatestPayment();
        if (\request()->ajax()) {
            return DataTables::of($payments)
                ->addIndexColumn()
                ->addColumn('status', function ($payment) {
                    return showStatus($payment->status);
                })
                ->addColumn('action', function ($payment) {
                    return view('payment.actionColumn', compact('payment'));
                })
                ->rawColumns(['status', 'action'])
                ->tojson();
        }
        return view('payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $data = ['name' => $request->name];
        $this->paymentRepo->createPayment($data);

        return successRedirect('Data added successfully', 'payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['payment'] = $this->paymentRepo->getAnIntence($id);
        return view('payment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request)
    {
        $data = ['name' => $request->name];
        $this->paymentRepo->updatePayment($data, $request->id);
        return successRedirect('Data added successfully', 'payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->paymentRepo->deletePayment($id);
        return successRedirect('Data is removed', 'payment.index');
    }

    /**
     * activeInactive
     *
     * @param  mixed $id
     * @return void
     */
    public function activeInactive($id)
    {
        return $this->paymentRepo->changeStatusPayment($id);
    }
}
