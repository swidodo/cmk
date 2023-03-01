<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data['title']   = 'Role';
        $data['page']    = 'Manajemen Role';
        $data['subpage'] = 'role';
        $data['roles']    = Role::all();
        return view('setting.role.index',$data);
    }
    public function create()
    {
        $data['title']   = 'Role';
        $data['page']    = 'Manajemen Role';
        $data['subpage'] = 'create role';
        return view('setting.role.create',$data);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'type'          => 'required|unique:roles',
            'description'   => 'required'
        ]);
        if (Role::insert($validate)){
            return redirect('/role')->with('status','success');
        }else{
            return redirect('/role')->with('status','error');
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data['title']   = 'Role';
        $data['page']    = 'Manajemen Role';
        $data['subpage'] = 'edit role';
        $data['role']    = Role::find($id);
        return view('setting.role.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $validate = [
            'description'   => 'required'
        ];
        $role = Role::find($id);
        if ($request->type != $role->type){
            $validate['type'] = 'required|unique:roles';
        }
        $request->validate($validate);
        $data = [
            'type'          => $request->type,
            'description'   => $request->description,
        ];
        $update = Role::where('id',$id)->update($data);
        if ($update){
            return redirect('/role')->with('status','success');
        }else{
            return redirect('/role')->with('status','error');
        }
    }
    public function destroy($id)
    {
        if(Role::destroy($id)){
            $data =[
                'status' => 'success',
                'message'=> 'Data berhasil dihapus!',
            ];
        }else{
            $data =[
                'status' => 'success',
                'message'=> 'Data berhasil dihapus!',
            ];
        }

        return response()->json($data);
    }
}
