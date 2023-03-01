<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\setting\Response;
use App\Models\setting\Application as App;
use App\Models\setting\ApplicationGroup as Group;

class ApplicationController extends Controller
{
    public function index()
    {
        $data['title']   = 'Aplikasi';
        $data['page']    = 'Manajemen Aplikasi';
        $data['subpage'] = 'aplikasi';
        $data['app']     = App::all();
        $data['group']   = Group::all();
        return view('setting.application.index',$data);

    }
    public function create()
    {
        $data['title']   = 'Aplikasi';
        $data['page']    = 'Manajemen Aplikasi';
        $data['subpage'] = 'aplikasi';
        $data['group']   = Group::all();
        return view('setting.application.create',$data);
    }
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'name'                  =>'required|unique:applications',
            'group_application_id'  =>'required',
            'description'           =>'required',
            'directory'             =>'required',
            'status'                =>'required'
        ]);

        if ($dataValidate){
           if(App::insert($dataValidate)){
               return redirect('/application')->with('status','success');
            }else{
                return redirect('/application')->with('status','error');
            }
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data['title']   = 'Aplikasi';
        $data['page']    = 'Manajemen Aplikasi';
        $data['subpage'] = 'aplikasi';
        $data['app']     = App::find($id);
        $data['group']   = Group::all();
        return view('setting.application.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $dataValidate = [
            'group_application_id'  =>'required',
            'description'           =>'required',
            'directory'             =>'required',
            'status'                =>'required'
        ];
        $name = App::find($id);
        if ($name->name != $request->name){
            $dataValidate['name'] = 'required|unique:applications';
        }
        $dataupdate = $request->validate($dataValidate);
        $update = App::where('id', $id)->update($dataupdate);
        if ($update){
            return redirect('/application')->with('status','success');
        }else{
            return redirect('/application')->with('status','error');
        }
    }
    public function destroy($id)
    {
        if (App::destroy($id)){
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
