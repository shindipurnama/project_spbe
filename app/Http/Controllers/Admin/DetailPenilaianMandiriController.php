<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Aspek;
use App\Models\Indikator;
use App\Models\Kirteria;
use App\Models\PenilaianMandiri;
use App\Models\IndikatorSPBE;
use App\Models\Capaian;
use Illuminate\Support\Facades\Auth;
use Session;

class DetailPenilaianMandiriController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        // dd($request->all());
        $spbe = IndikatorSPBE::latest('id')->first();
        // dd($spbe);
        $id = $spbe->id ?? 0;

        $data_spbe = array(
            'spbe_id'=>$id+1,
            'penilaian_id'=>$request->penilaian_id,
            'domain_id'=>$request->domain,
            'aspek_id'=>$request->aspek,
            'indikator_id'=>$request->indikator,
            'spbe'=>$request->spbe,
            'jumlah_capaian'=>0,
            'total'=>0,
        );
        IndikatorSPBE::create($data_spbe);

        foreach ($request->kirteria as $key => $kirteria){
            $kirteria = Kirteria::latest('id')->first() ?? "0";
            $id_kriteria = 0;
            if($kirteria == "0") {
                $id_kriteria+1;
            }else{
                $id_kriteria = $kirteria->id + 1;
            }

            $data = array(
                'kirteria_id' =>$id_kriteria,
                'spbe_id'=>$id+1,
                'kirteria'=>$request->kirteria[$key]
            );
            Kirteria::create($data);
        }

        Session::flash('success', 'Berhasil Input Data');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //

        $user = Auth::id();
        $domain = Domain::All();
        $aspek = Aspek::All();
        $indikator = Indikator::All();
        $penilaian =PenilaianMandiri::find($id);
        $spbe =  IndikatorSPBE::where('indikator_spbe.penilaian_id',$penilaian->penilaian_id)->get();
        $kirteria = Kirteria::All();
        $capaian=Capaian::where(['penilaian_id'=>$penilaian->penilaian_id,'user_id'=>$user])->first();
        if($capaian){
            $status = 1;
        }else{
            $status = 0;
        }
        // dd($status);
        return view('penilaian-mandiri-detail', compact('domain', 'aspek', 'indikator','penilaian','spbe','kirteria','status'));
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
        $spbe =  IndikatorSPBE::find($id);
        $domain = Domain::All();
        $aspek = Aspek::All();
        $indikator = Indikator::All();
        $kirteria = Kirteria::where('spbe_id',$spbe->spbe_id)->get();
        // dd($kirteria);

        return view('penilaian-mandiri-indikator', compact('domain', 'aspek', 'indikator','kirteria','spbe'));
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
        switch ($request->input('action')) {
            case 'save':
                IndikatorSPBE::find($id)->update($request->all());
                Session::flash('success', 'Berhasil Update Data');
                return back();
            break;
            case 'kirteria':
                Kirteria::find($id)->update($request->all());
                Session::flash('success', 'Berhasil Update Data');
                return back();
            break;
        }
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
        $spbe = IndikatorSPBE::find($id);
        $Kirteria = Kirteria::where('spbe_id',$spbe->spbe_id)->delete();
        $spbe->delete();
        // dd($capaian);
        Session::flash('success', 'Berhasil Hapus Data');
        return back();
    }

}
