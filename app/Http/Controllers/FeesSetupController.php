<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\ClassSectionInterface;
use App\Repository\Interfaces\FeesInterface;
use App\Repository\Interfaces\FeesSetupInterface;
use App\Repository\Interfaces\GroupInterface;
use App\Repository\Interfaces\KlassInterface;
use App\Repository\Interfaces\PaymentInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeesSetupController extends Controller
{
    protected $feesSetupRepo;
    protected $classRepo;
    protected $groupRepo;
    protected $sectionRepo;
    protected $feesRepo;
    protected $paymentRepo;

    /**
     * __construct
     *
     * @param  mixed $klassInterface
     * @param  mixed $groupInterface
     * @param  mixed $classSectionInterface
     * @param  mixed $feesInterface
     * @param  mixed $paymentInterface
     * @return void
     */
    public function __construct(FeesSetupInterface $feesSetupInterface, KlassInterface $klassInterface, GroupInterface $groupInterface, ClassSectionInterface $classSectionInterface, FeesInterface $feesInterface, PaymentInterface $paymentInterface)
    {
        $this->feesSetupRepo = $feesSetupInterface;
        $this->classRepo = $klassInterface;
        $this->groupRepo = $groupInterface;
        $this->sectionRepo = $classSectionInterface;
        $this->feesRepo = $feesInterface;
        $this->paymentRepo = $paymentInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feesSetups = $this->feesSetupRepo->getLatestSetupFees();
        if (\request()->ajax()) {
            return DataTables::of($feesSetups)
                ->addIndexColumn()
                ->addColumn('status', function ($feesSetup) {
                    // $status =$fees->status;
                    // return ;
                    return showStatus($feesSetup->status);
                })
                ->addColumn('action', function ($feesSetup) {
                    return view('fees-settings.actionColumn', compact('feesSetup'));
                })
                ->rawColumns(['status', 'action'])
                ->tojson();
        }
        return view('fees-settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['classes'] = $this->classRepo->getAllKlassList();
        $data['groups'] = $this->groupRepo->getAllGroupList();
        $data['sections'] = $this->sectionRepo->getAllSection();
        $data['feeses'] = $this->feesRepo->getAllFees();
        $data['payments'] = $this->paymentRepo->getAllPaymentList();
        return view('fees-settings.add', $data);
    }

    protected function feesSettingsCommonData($request)
    {
        return [
            'acedamic_year' => $request->acedamic_year,
            'klass_id' => $request->class_id,
            'group_id' => $request->group_id,
            'section_id' => $request->section_id,
            'payment_id' => $request->payment_id,
            'fees_id' => $request->fees_id,
            'amount' => $request->amount
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
        $data = $this->feesSettingsCommonData($request);
        $this->feesSetupRepo->createSetupFees($data);
        return successRedirect('Data added successfully', 'fees-setup.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->feesSetupRepo->deleteSetupFees($id);

        return successRedirect('Data is removed', 'fees-setup.index');
    }

    public function activeInactive($id)
    {
        return $this->feesSetupRepo->changeFeesSetupStatus($id);
    }
}
