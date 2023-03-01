<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\setting\ApplicationGroup;
use App\Models\setting\Role;
use App\Models\setting\Permission;

class PermissionGroupController extends Controller
{
    public function index(){
        $data['title']   = 'Permission';
        $data['page']    = 'Manajemen Permission Group';
        $data['subpage'] = 'permission group';
        $data['role']    = Role::all();
        $data['group']   = ApplicationGroup::all();
        $data['listgroup']  = '';
        return view('setting.group_permission.index', $data);
    }
    public function get_group(Request $request){
        $arr = Permission::join('applications','permissions.application_id','=','applications.id')
                            ->where('permissions.role_id',$request->role_id)
                            ->get();
        $lists =[];
        foreach ($arr as $list){
            $listgroup = $list->group_application_id;
            array_push($lists,$listgroup);
        }
        $data['title']      = 'Permission';
        $data['page']       = 'Manajemen Permission Group';
        $data['subpage']    = 'permission group';
        $data['role']       = Role::all();
        $data['roleId']     = Role::find($request->role_id);
        $data['listgroup']  = $lists;
        $data['group']      = ApplicationGroup::all();
        return view('setting.group_permission.index', $data);
    }
    public function update_row(Request $request){
        $app =[];
        $group = DB::table('applications')
                ->select("applications.id")
                ->join('group_applications','applications.group_application_id','=','group_applications.id')
                ->get();
        foreach($group as $val){
            $data = [
                'role_id'        => $request->role_id,
                'application_id' => $val->id,
            ];
            array_push($app,$data);
        }
        return Permission::insert($app);
    }
    public function removeListAll(Request $request){
        return Permission::where('role_id',$request->role_id)->delete();
    }
    public function addList(Request $request){
        $app =[];
        $group = DB::table('applications')
                    ->select("applications.id")
                    ->join('group_applications','applications.group_application_id','=','group_applications.id')
                    ->where('group_application_id',$request->group_id)
                    ->get();
        foreach($group as $val){
            $data = [
                'role_id'        => $request->role_id,
                'application_id' => $val->id,
            ];
            array_push($app,$data);
        }
        return Permission::insert($app);
    }
    public function removeList(Request $request){
        $group = DB::table('applications')
                    ->select("applications.id")
                    ->join('group_applications','applications.group_application_id','=','group_applications.id')
                    ->where('group_application_id',$request->group_id)
                    ->get();
        foreach($group as $val){
           Permission::where('role_id',$request->role_id)
                        ->where('application_id',$val->id)
                        ->delete();
        }

    }
}
