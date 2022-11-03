<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Aspek;
use App\Models\Indikator;
use App\Models\User;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $code_domain = Domain::count('id') ?? 0;
        $code_domain ='D'.str_pad($code_domain+1, 3, "0", STR_PAD_LEFT);
        $domain = Domain::All();

        $code_aspek = Aspek::count('id') ?? 0;
        $code_aspek ='A'.str_pad($code_aspek+1, 3, "0", STR_PAD_LEFT);
        $aspek = Aspek::All();

        $code_indikator = Indikator::count('id') ?? 0;
        $code_indikator ='I'.str_pad($code_indikator+1, 3, "0", STR_PAD_LEFT);
        $indikator = Indikator::All();

        $user = User::All();
        return view("user-management", compact('code_domain','domain','code_aspek','aspek','code_indikator','indikator', 'user'));
        // abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
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
