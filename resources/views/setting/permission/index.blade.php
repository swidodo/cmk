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
                        <form action="/permission/group" method="post">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-4">Pilih Role</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control form-select" id="role_id" name="role_id" required>
                                            <option value="">--Pilih--</option>
                                            @foreach($role as $roles)
                                                <option value="{{ $roles->id}}">{{ $roles->type }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm">submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <div class="table-responsive">
                            <strong>List Aplikasi</strong>
                            <table class="table border-1 table-striped table-bordered table-hover table-sm bg-white">
                                <thead class="text-center text-dark bg-table-head">
                                    <th>No</th>
                                    <th>Nama Aplikasi</th>
                                    <th>Access</th>
                                    <th>Create</th>
                                    <th>Read</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>

                                    @foreach($access as $permis)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $permis->application->name }}</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input access" type="checkbox" data-id="{{$permis->id}}" data-name="access" id="inlineCheckbox1" value="1" disabled>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input access" type="checkbox" data-id="{{$permis->id}}" data-name="create" id="inlineCheckbox1" value="1" disabled >
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input access" type="checkbox" data-id="{{$permis->id}}" data-name="read" id="inlineCheckbox1" value="1" disabled>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input access" data-id="{{$permis->id}}" type="checkbox" data-name="update" id="inlineCheckbox1" value="1" disabled>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input access" type="checkbox" data-id="{{$permis->id}}" data-name="delete" id="inlineCheckbox1" value="1" disabled>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if (session('status'))
    <input type="hidden" value="{{ session('status') }}" id="flashdata">
@endif

@endsection()
