<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']   = 'Group User';
        $data['page']    = 'Manajemen Group User';
        $data['subpage'] = 'group user';
        $data['users']   = User::all();
        return view('setting.user.index',$data);
    }

    public function create()
    {
        $data['title']   = 'Group User';
        $data['page']    = 'Manajemen Group User';
        $data['subpage'] = 'group user';
        return view('setting.user.create');
    }
    public function store(Request $request)
    {
        $validate =[
            'name'      =>'required',
            'username'  =>'required|unique:users',
            'email'     =>'required|unique:users',
            'divisi'    =>'required',
            'jabatan'   =>'required',
            'flag'      =>'required',
            'password'  =>'required',
        ];

        $validate['password'] ='' ;

        $request->validate($validate);
        if (User::insert($validate)){
            return redirect('/user')->with('success','Data berhasil disimpan !');
        }else{
            return redirect('/user')->with('err','Data gagal disimpan !');
        }
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data['title']   = 'Group User';
        $data['page']    = 'Manajemen Group User';
        $data['subpage'] = 'group user';
        $data['user']    = User::find($id);
        return view('setting.user.edit',$data);
    }


    public function update(Request $request, $id)
    {
        $validate =[
            'name'      =>'required',
            'divisi'    =>'required',
            'jabatan'   =>'required',
            'flag'      =>'required',
        ];
        $user = User::find($id);
        if ($request->username != $user->username){
            $validate['username'] = 'required|unique:users';
        }
        if ($request->email != $user->email){
            $validate['email'] = 'required|unique:users';
        }
        if ($request->password != $user->password){
            $validate['password'] = 'required';
        }

        $request->validate($validate);
        $update = User::where('id',$id)->update($validate);
        if ($update){
            return redirect()->with('success','Data berhasil diupdate!');
        }else{
            return redirect()->with('err','Data gagal diupdate!');
        }
    }
    public function destroy($id)
    {
        if (User::destroy($id)){
            $data =[
                'status' => 'success',
                'message'=> 'Data berhasil dihapus !',
            ];
        }else{
            $data =[
                'status' => 'err',
                'message'=> 'Data gagal dihapus !',
            ];
        }
        return response()->json($data);
    }
}
