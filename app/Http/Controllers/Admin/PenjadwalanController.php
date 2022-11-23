<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjadwalan;
use Symfony\Component\HttpFoundation\Response;

class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjadwalan_id = Penjadwalan::latest('id')->first() ?? "0";
        // dd($penjadwalan_id->id+1);
        $penjadwalan_id2 = 0;
        if($penjadwalan_id == "0"){
            $penjadwalan_id2 = 1;
        }else{
            $penjadwalan_id2 = $penjadwalan_id->id+1;
        }
        $id = 'J'.str_pad($penjadwalan_id2,3,"0",STR_PAD_LEFT);

        $penjadwalan = array(
            'penjadwalan_id'=>$id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        );
        Penjadwalan::create($penjadwalan);
        return back();

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

        $jadwal = Penjadwalan::find($id)->update($request->all());
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
        //

        Penjadwalan::find($id)->delete();
        return back();
    }
}
