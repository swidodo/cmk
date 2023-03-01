@extends('layout.main')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm border-1 border-dark rounded-lg mt-5">
            @if (session('status'))
                <input type="hidden" value="{{ session('status') }}" id="flashdata">
            @endif
                <div class="card-header">
                    <div class="d-flex justify-content-between text-center my-1">
                        <div>
                            <!-- <a href="/application" class="btn btn-light btn-outline-primary btn-sm" data-bs-target="#ModalCreateApplication" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah</a> -->
                            <a href="/application/create" class="btn btn-light btn-outline-primary btn-sm">Tambah</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Excel</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Pdf</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="nama" placeholder="Nama Apliksi" class="form-control form-control-sm me-2">
                            <input type="text" name="username" placeholder="Group" class="form-control form-control-sm me-2">
                            <button id="" class="btn btn-sm btn-dark">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-1 table-striped table-bordered table-hover table-sm bg-white">
                            <thead class="text-center text-dark bg-table-head">
                                <th>No</th>
                                <th>Nama Aplikasi</th>
                                <th>Group aplikasi</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Folder</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($app as $apps)
                                <tr  id="{{$apps->id}}">
                                    <td>{{ $loop->iteration }}
                                    <td>{{ $apps->name }}</td>
                                    <td>{{ $apps->applicationgroup }}</td>
                                    <td>{{ $apps->description }}</td>
                                    <td>{{ $apps->image }}</td>
                                    <td>{{ $apps->directory }}</td>
                                    <td>{{ ($apps->status == '1') ? 'Aktif' :'Non aktif' }}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="/application/{{ $apps->id }}/edit" class="btn btn-xs btn-success me-1"><span class="fa fa-edit fa-lg py-1"></span></a>
                                        <a href="javascript:void(0);" class="btn btn-xs btn-danger del_aplikasi" data-id="{{$apps->id}}"><span class="fa fa-trash fa-lg py-1"></span></a>
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

@include('..setting.application.js.app')
@endsection()
@include('..setting.application.modal.create')
@include('..setting.application.modal.edit')



