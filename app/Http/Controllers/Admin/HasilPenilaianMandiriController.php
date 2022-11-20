<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Capaian;
use App\Models\User;
use App\Models\Kirteria;
use App\Models\PenilaianMandiri;
use Illuminate\Support\Facades\Auth;
use DB;

class HasilPenilaianMandiriController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::id();
        $role = User::find($user);
        if ($role->role_id == 'R001'){
            $penilaian = PenilaianMandiri::All();
        }else{
            $penilaian = PenilaianMandiri::leftJoin('capaian','penilaian_mandiri.penilaian_id','=','capaian.penilaian_id')
                                        ->select(DB::raw('count(capaian.penilaian_id) as jumlah'), 'penilaian_mandiri.penilaian_id','penilaian_mandiri.penjadwalan_id','penilaian_mandiri.penilaian_name','penilaian_mandiri.jumlah_indikator')
                                        ->where('capaian.user_id',$user)
                                        ->groupBy('penilaian_mandiri.penilaian_id','penilaian_mandiri.penjadwalan_id','penilaian_mandiri.penilaian_name','penilaian_mandiri.jumlah_indikator')->get();
        }
        // dd($penilaian);
        return view('hasil-penilaian-mandiri',compact('penilaian'));
        // abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        $user = Auth::id();
        $role = User::find($user);
        if ($role->role_id == 'R002'){
            $penilaian = Capaian::where('penilaian_id',$id)
                                ->where('user_id',$user)
                                ->select(DB::raw('count(kirteria_id) as jumlah'),DB::raw('sum(nilai) as nilai'),'spbe_id')
                                ->groupBy('spbe_id')->get();
            $head = Capaian::where('penilaian_id',$id)->first();
        }else{
            $penilaian = PenilaianMandiri::leftJoin('capaian','penilaian_mandiri.penilaian_id','=','capaian.penilaian_id')
                                        ->select(DB::raw('count(capaian.penilaian_id) as jumlah'), 'penilaian_mandiri.penilaian_id','penilaian_mandiri.penjadwalan_id','penilaian_mandiri.penilaian_name','penilaian_mandiri.jumlah_indikator')
                                        ->where('capaian.user_id',$user)
                                        ->groupBy('penilaian_mandiri.penilaian_id','penilaian_mandiri.penjadwalan_id','penilaian_mandiri.penilaian_name','penilaian_mandiri.jumlah_indikator')->get();
            $head = Capaian::where('penilaian_id',$id)->first();
        }
        // dd($penilaian);
        return view('detail-hasil-penilaian-mandiri',compact('head','penilaian'));
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
            $spbe = Kirteria::find($request->kirteria_id[$key]);
            $capaian = 'capaian'.$spbe->id;
            // dd($request->$capaian);
            $data = array(
                'user_id' => $request->user_id,
                'penilaian_id'=> $request->penilaian_id,
                'kirteria_id'=>$request->kirteria_id[$key],
                'spbe_id'=>$spbe->spbe_id,
                'nilai'=>$request->$capaian ?? 0
            );
            // dd($data);
            Capaian::create($data);
        }


        // $capaian = Kirteria::where('spbe_id',$id)->sum('int_attribute');
        // $spbe =
        return redirect()->route('penilaian-mandiri.index');
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
