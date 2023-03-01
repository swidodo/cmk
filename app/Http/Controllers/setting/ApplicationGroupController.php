<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\ApplicationGroup as Group;

class ApplicationGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']   = 'Aplikasi';
        $data['page']    = 'Manajemen Aplikasi';
        $data['subpage'] = 'aplikasi';
        $data['group']   = Group::all();
        return view('setting.group_application.index',$data);
    }

    public function create()
    {
        $data['title']   = 'Group Aplikasi';
        $data['page']    = 'Manajemen Group Aplikasi';
        $data['subpage'] = 'group aplikasi';
        $data['group']   = Group::all();
        return view('setting.group_application.create',$data);
    }

    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'group_name' =>'required|unique:group_applications',
            'description' => 'required',
        ]);

        if (Group::insert($dataValidate)){
            return redirect('/group_application')->with('status','success');
        }else{
            return redirect('/group_application')->with('status','error');
        }
    }

    public function show($id)
    {

    }
    public function edit($id)
    {
        $data['title']   = 'Group Aplikasi';
        $data['page']    = 'Manajemen Group Aplikasi';
        $data['subpage'] = 'edit aplikasi';
        $data['group']  = Group::find($id);
        return view('setting.group_application.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $dataValidate = [
            'description' => 'required',
        ];

       $data = Group::find($id);
        if ($data->group_name != $request->group_name){
            $dataValidate['group_name'] = 'required|unique:group_applications';
        }
        $dataUpdate = $request->validate($dataValidate);
        $update = Group::where('id',$id)->update($dataUpdate);
        if ($update){
            return redirect('/group_application')->with('status','success');
        }else{
            return redirect('/group_application')->with('status','error');
        }
    }
    public function destroy($id)
    {
        if (Group::destroy($id)){
            $data = [
                'status' => 'success',
            ];
        }else{
            $data = [
                'status' => 'error',
            ];
        }
        return response()->json($data);
    }
}
