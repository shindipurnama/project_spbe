<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjadwalan;
use App\Models\User;
use App\Models\Capaian;
use App\Models\PenilaianMandiri;
use App\Models\Domain;
use App\Models\Aspek;
use App\Models\Indikator;
use App\Models\IndikatorSPBE;

class PenilaianMandiriController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $jadwal = Penjadwalan::All();
        $penilaian = PenilaianMandiri::All();
        $domain = Domain::All();
        $aspek = Aspek::All();
        $indikator = Indikator::All();

        return view('penilaian-mandiri', compact('jadwal','penilaian','domain','aspek','indikator'));
        // abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $skpd = User::where('role_id','R002')->get();
        $penilaian_id = PenilaianMandiri::latest('id')->first() ?? "0";
        // dd($penilaian_id->id+1);
        $penilaian_id2 = 0;
        if($penilaian_id == "0"){
            $penilaian_id2 = 1;
        }else{
            $penilaian_id2 = $penilaian_id->id+1;
        }
        $id = 'PM'.str_pad($penilaian_id2,3,"0",STR_PAD_LEFT);
        // dd($request->all());

        // foreach($skpd as $key => $skpd){
        //     $data = array(
        //         'penilaian_id' => $id,
        //         'user_id' => $skpd->username
        //     );
        //     Capaian::create($data);
        // }

        $penilaian = array(
            'penilaian_id'=>$id,
            'penjadwalan_id'=>$request->penjadwalan_id,
            'penilaian_name'=>$request->penilaian_name,
            'jumlah_indikator'=>0
        );
        PenilaianMandiri::create($penilaian);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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

        PenilaianMandiri::find($id)->update($request->all());
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
        $penilaian = PenilaianMandiri::find($id);
        $capaian = Capaian::where('penilaian_id',$penilaian->penilaian_id)->delete();
        $penilaian->delete();
        // dd($capaian);
        return back();
    }

}
