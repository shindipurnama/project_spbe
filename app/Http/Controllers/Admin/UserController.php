<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Aspek;
use App\Models\Indikator;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;

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

        $user = User::All();
        $role = Roles::All();
        return view("user-management", compact('user', 'role'));
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
        $image = $request->image;
        $input['imagename'] =$request->username.'.'.$image->extension();

        $filePath2 = public_path('/assets/img/users/');
        // dd($filePath2);
        $image->move($filePath2, $input['imagename']);

        // dd($request->All());
        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'role_id'=>$request->role_id,
            'password'=>Hash::make($request->password),
            'foto' => '/assets/img/users/'.$input['imagename'],
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        );
        // dd($data);
        User::create($data);
        return redirect()->route('user-management.index');

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
        $data = "";
        $image = $request->image;
        // dd($request->image2);
        if($image == null) {
            $data = $request->image2;
        }else{
            $input['imagename'] =$request->username.'.'.$image->extension();
    
            $filePath2 = public_path('/assets/img/users/');
            $image->move($filePath2, $input['imagename']);
            $data = '/assets/img/users/'.$input['imagename'];
        }

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'role_id'=>$request->role_id,
            // 'password'=>Hash::make($request->password),
            'foto' => $data,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        );

        $user = User::find($id)->update($data);

        // $pass = Hash::make($request->password);
        // user::find($id)->update(['password'=>$pass]);

        return redirect()->route('user-management.index');
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
