@extends('layout.main')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm border-1 border-dark rounded-lg mt-5">
                <div class="card-header">
                    <div class="text-center my-1">
                        HAK AKSES APLIKASI
                    </div>
                </div>
                    <div class="card-body">
                        <form action="/permission_group/group" method="post">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-4">Pilih Role</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control form-select form-control-sm col-md-8" name="role_id" id="choose_role" required>
                                            <option value="">--pilih--<option>
                                            @foreach($role as $roles)
                                                <option value="{{ $roles->id}}" @if (isset($roleId->id)) {{($roles->id==$roleId->id)?'selected':''}}@endif>{{ $roles->type }}{{old('role_id')}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm">Pilih</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <div class="table-responsive">
                            <form action="/permission/set" method="post">
                                @csrf
                                @method('PUT')
                                Nama Role : <strong class="ft-dark">{{ (isset($roleId->type)) ? $roleId->type:'-' }}</strong>
                                <input type="hidden" value="{{ (isset($roleId->id)) ? $roleId->id:'' }}" id="roleId">
                                <table class="table border-1 table-striped table-bordered table-hover table-sm bg-white">
                                <thead class="text-center text-dark bg-table-head">
                                    <th>No</th>
                                    <th>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input access" type="checkbox" data-list="all" id="all">
                                        </div>
                                    </th>
                                    <th>Nama Group Aplikasi</th>
                                </thead>
                                <tbody>
                                    @foreach($group as $groups)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input access" type="checkbox" data-list="group" data-id="{{$groups->id}}" id="inlineCheckbox1" value="1" {{ (in_array($groups->id,$listgroup))?'checked':''}}>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $groups->group_name }}
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('status'))
    <input type="hidden" value="{{ session('status') }}" id="flashdata">
@endif
@include('setting.group_permission.js.group_permission');
@endsection()
