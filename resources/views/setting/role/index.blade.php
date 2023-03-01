@extends('layout.main')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm border-1 border-dark rounded-lg mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between text-center my-1">
                        <div>
                            <a href="/role/create" class="btn btn-light btn-outline-primary btn-sm">Tambah</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Excel</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Pdf</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="group" placeholder="Group" class="form-control form-control-sm me-2">
                            <button id="" class="btn btn-sm btn-dark">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-1 table-striped table-bordered table-hover table-sm bg-white">
                            <thead class="text-center text-dark bg-table-head">
                                <th>No</th>
                                <th>Group Akses</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr id="{{ $role->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $role->type }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td class="text-center">
                                        <a href="/role/{{ $role->id }}/edit" class="btn btn-xs btn-success"><span class="fa fa-edit fa-lg py-1"></a>
                                        <a href="/role/{{ $role->id }}" class="btn btn-xs btn-danger del_aplikasi" data-id="{{ $role->id }}"><span class="fa fa-trash fa-lg py-1"></span></a>
                                    </td>
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
@include('..setting.role.js.role')
@endsection()
