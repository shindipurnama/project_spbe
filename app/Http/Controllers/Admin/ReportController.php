<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Capaian;
use App\Models\Kirteria;
use App\Models\PenilaianMandiri;
use DB;
use PDF;

class ReportController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $id)
    {
        // dd($id);
        $penilaian = Capaian::where(['spbe_id'=>$id, 'user_id'=>$request->user_id])->get();

        $nilai = Capaian::where(['spbe_id'=>$id, 'user_id'=>$request->user_id])
                                ->select(DB::raw('count(kirteria_id) as jumlah'),DB::raw('sum(nilai) as nilai'),'spbe_id','user_id')
                                ->groupBy('spbe_id','user_id')->get();

        $head = Capaian::where('spbe_id',$id)->first();
        // dd($head);
    	// $pdf = PDF::loadview('laporan', compact('penilaian', 'head','nilai'));
    	// return $pdf->stream('laporan-hasil-penilaian-mandiri-pdf');

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('laporan', compact('penilaian', 'head','nilai'))->stream('laporan-hasil-penilaian-mandiri-pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penilaian = Capaian::where('penilaian_id',$id)
                ->select(DB::raw('count(kirteria_id) as jumlah'),DB::raw('sum(nilai) as nilai'),'user_id', 'spbe_id')
                ->groupBy('user_id', 'spbe_id')->get();
        $head = Capaian::where('penilaian_id',$id)->first();

        $pdf = PDF::loadview('laporan-all', compact('penilaian', 'head', 'id'));
    	return $pdf->stream('laporan-hasil-penilaian-mandiri-pdf');
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
        //
    }

}
