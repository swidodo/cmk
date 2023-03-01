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
                            <a href="/group_application/create" class="btn btn-light btn-outline-primary btn-sm">Tambah</a>
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
                                <th>Group</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($group as $groups)
                                <tr  id="{{$groups->id}}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $groups->group_name }}</td>
                                    <td>{{ $groups->description }}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="/group_application/{{ $groups->id }}/edit" class="btn btn-xs btn-success me-1"><span class="fa fa-edit fa-lg py-1"></span></a>
                                        <a href="javascript:void(0);" class="btn btn-xs btn-danger del_group_aplikasi" data-id="{{$groups->id}}"><span class="fa fa-trash fa-lg py-1"></span></a>
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
@include('..setting.group_application.js.group_app')
@endsection()
@include('..setting.group_application.modal.edit')

