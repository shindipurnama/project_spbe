<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SKPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skpd = User::where('role_id','R002')->get();
        $user = User::where('role_id','R002')->get();
        // dd($skpd);
        return view('skpd', compact('skpd','user'));
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
        //
        $image = $request->image;
        $input['imagename'] =$request->username.'.'.$image->extension();

        $filePath2 = public_path('/assets/img/users/');
        // dd($filePath2);
        $image->move($filePath2, $input['imagename']);

        $data = array(
            'name'=>$request->name,
            'email'=>'',
            'username'=>$request->username,
            'tipe'=>$request->tipe,
            'role_id'=>'R002',
            'password'=>Hash::make($request->username),
            'foto' => '/assets/img/users/'.$input['imagename'],
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        );
        // dd($data);
        User::create($data);
        return redirect()->route('skpd.index');
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

       User::find($id)->update($request->all());

        return redirect()->route('skpd.index');
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
        // dd($id);
        User::find($id)->update($request->all());

        return redirect()->route('skpd.index');
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
        User::find($id)->delete();
        return back();
    }
}
