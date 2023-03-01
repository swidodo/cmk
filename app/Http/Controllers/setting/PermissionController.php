<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Role;
use App\Models\setting\Permission;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
   public function index(){
        $data['title']   = 'Permission';
        $data['page']    = 'Manajemen Permission';
        $data['subpage'] = 'permission';
        $data['role']    = Role::all();
        $data['access']  = Permission::all();
        return view('setting.permission.index', $data);
   }
   public function get_access_group(Request $request){
        $data['title']   = 'Permission';
        $data['page']    = 'update permission';
        $data['subpage'] = 'permission';
        $data['role']    = Role::all();
        $data['roleId'] = Role::find($request->role_id);
        $data['access']  = Permission::selectRaw('*')
                                        ->where('role_id',$request->role_id)
                                        ->groupBy('application_id')
                                        ->get();
        return view('setting.permission.permission_group', $data);
   }
   public function update(Request $request){
        $data = [
            'of_'.$request->name    => $request->val,
        ];
        $update = Permission::where('id',$request->id)->update($data);
        if ($update){
            $respon =[
                'status' =>'true',
                'errors' =>'',
            ];
        }else{
            $respon =[
                'status' =>'false',
                'errors' =>'1',
            ];
        }
        return response()->json($respon);
   }
}
