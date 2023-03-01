@extends('layout.main')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm border-1 border-dark rounded-lg mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between text-center my-1">
                        <div>
                            <a href="/user/create" class="btn btn-light btn-outline-primary btn-sm" title="tambah">Tambah</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Excel</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Pdf</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="nama" placeholder="Nama" class="form-control form-control-sm me-2">
                            <input type="text" name="username" placeholder="Username" class="form-control form-control-sm me-2">
                            <input type="text" name="email" placeholder="Email" class="form-control form-control-sm me-2">
                            <button id="" class="btn btn-sm btn-dark">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-1 table-striped table-bordered table-hover table-sm bg-white">
                            <thead class="text-center text-dark bg-table-head">
                                <th>No</th>
                                <th>nama</th>
                                <th>username</th>
                                <th>email</th>
                                <th>cabang</th>
                                <th>jabatan</th>
                                <th>devisi</th>
                                <th>flag</th>
                                <th>active</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="{{ $user->id }}">
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->branch }}</td>
                                        <td>{{ $user->jabatan }}</td>
                                        <td>{{ $user->divisi }}</td>
                                        <td>{{ $user->flag }}</td>
                                        <td>{{ $user->active }}</td>
                                        <td class="text-center">
                                            <a href="/user/{{ $user->id }}/edit" class="btn btn-xs btn-success"><span class="fa fa-edit fa-lg py-1"></span></a>
                                            <a href="javascript:void();" class="btn btn-xs btn-danger"><span class="fa fa-trash fa-lg py-1"></span></a>
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
@endsection()
@include('..setting.user.modal.create')
@include('..setting.user.modal.edit')

