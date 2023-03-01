@extends('layout.main')
@section('main-content')
<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm border-1 border-dark rounded-lg mt-5">
                <div class="card-header">
                    <div class="row text-center my-1">
                        <div class="col-md-4 mb-2">
                            <a href="" class="btn btn-light btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalCreateBranch">Tambah</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Excel</a>
                            <a href="" class="btn btn-light btn-outline-primary btn-sm">Pdf</a>
                        </div>
                        <div class="col-md-8 row">
                            <input type="text" name="kode" placeholder="Kode" class="form-control form-control-sm me-2 col-6">
                            <input type="text" name="nama_cabang" placeholder="Nama Cabang" class="form-control form-control-sm me-2 col-6">
                            <button id="" class="btn btn-sm btn-dark">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-1 table-striped table-bordered table-hover table-sm bg-white">
                            <thead class="text-center text-dark bg-table-head">
                                <th></th>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama cabang</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Fax</th>
                                <th>Alamat</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <a href="" class="btn btn-xs btn-success" data-bs-toggle="modal" data-bs-target="#ModalEditBranch"><span class="fa fa-edit fa-lg py-1"></span></a>
                                        <a href="" class="btn btn-xs btn-danger"><span class="fa fa-trash fa-lg py-1"></span></a>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <a href="" class="btn btn-xs btn-success" data-bs-toggle="modal" data-bs-target="#ModalEditBranch"><span class="fa fa-edit fa-lg py-1"></span></a>
                                        <a href="" class="btn btn-xs btn-danger"><span class="fa fa-trash fa-lg py-1"></span></a>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection()
@include('branch.modal.create')      
@include('branch.modal.edit')

