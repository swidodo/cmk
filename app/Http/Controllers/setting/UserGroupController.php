<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\setting\User_group;
use App\Models\setting\Role;

class UserGroupController extends Controller
{
    public function index()
    {
        $data['title']   = 'Group User';
        $data['page']    = 'Manajemen Group User';
        $data['subpage'] = 'group user';
        $data['group']   = User_group::all();
        return view('setting.group_user.index',$data);
    }
    public function create()
    {
        $data['title']   = 'Group User';
        $data['page']    = 'Manajemen Group User';
        $data['subpage'] = 'create group user';
        $data['app']     = User::all();
        $data['role']    = Role::all();
        return view('setting.group_user.create',$data);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);
        $group = new User_group();
        $group->user_id = $request->user_id;
        $group->role_id = $request->role_id;
        $group->createby = '1973';

        if ($group->save()){
            return redirect('/group_user')->with('success','success');
        }else{
            return redirect('/group_user')->with('error','error');
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
        $data['subpage'] = 'edit group user';
        $data['app']     = User::all();
        $data['role']    = Role::all();
        $data['group']   = User_group::find($id);
        return view('setting.group_user.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $data = [
            'role_id' => $request->role_id,
            'user_id' => $request->user_id,
            'updateby' => '1974',
        ];
        $update =User_group::where('id',$id)->update($data);
        if ($update){
            return redirect('/group_user')->with('success','success');
        }else{
            return redirect('/group_user')->with('error','error');
        }
    }
    public function destroy($id)
    {
        $del = User_group::destroy($id);
        if ($del){
            $data = [
                'status'  =>'success',
                'message' => 'Data berhasil dihapus !',
            ];
        }else{
            $data = [
                'status'  =>'success',
                'message' => 'Data gagal dihapus !',
            ];
        }

        return response()->json($data, 200);
    }

    public function get_user(Request $request){
        $list ='';
        if ($request->search !=''){
            $data = User::where('name', 'like', '%'.$request->search.'%')->get();
            $list =[];
            $key=0;
            foreach ($data as $user){
                $list[$key]['text'] = $user->name;
                $list[$key]['id'] = $user->id;
                $key++;
            }
        }
         return response()->json($list, 200);
    }
}
