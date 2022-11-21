<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Capaian;
use App\Models\User;
use App\Models\Kirteria;
use App\Models\PenilaianMandiri;
use DB;

class DetailHasilPenilaianMandiriController extends Controller
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
        return view('detail-hasil-penilaian-mandiri');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        // return view('penilaian-mandiri-detail');
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
        //
        $penilaian = Capaian::where('penilaian_id',$id)
                ->select(DB::raw('count(kirteria_id) as jumlah'),DB::raw('sum(nilai) as nilai'),'user_id', 'spbe_id')
                ->groupBy('user_id', 'spbe_id')->get();
        $head = Capaian::where('penilaian_id',$id)->first();
        // dd($penilaian);
        return view('detail-hasil-penilaian-mandiri',compact('head','penilaian', 'id'));
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
        //
    }

}
