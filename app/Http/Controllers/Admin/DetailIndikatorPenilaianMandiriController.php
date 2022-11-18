<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Aspek;
use App\Models\Indikator;
use App\Models\Kirteria;
use DB;

class DetailIndikatorPenilaianMandiriController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('penilaian-mandiri-indikator');
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
        // dd($request->kirteria);
        $a = DB::table('kirteria')->latest()->first('id');
        $data = array(
            'kirteria_id' => $a->id+1,
            'spbe_id'=>$request->spbe_id,
            'kirteria'=>$request->kirteria
        );
        Kirteria::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request)
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
        foreach ($request->kirteria_id as $key => $kirteria){
            $kirteria = Kirteria::find($request->kirteria_id[$key]);
            $kirteria->int_attribute = $request->capaian[$key];
            // dd($kirteria);
            $kirteria->save();
        }

        $capaian = Kirteria::where('spbe_id',$id)->sum('int_attribute');
        $spbe = 
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Kriteria

        $Kirteria = Kirteria::find($id)->delete();
        return back();
    }

}
