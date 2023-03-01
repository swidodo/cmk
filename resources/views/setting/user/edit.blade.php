@extends('layout.main')
@section('main-content')
<div class="container-lg px-4">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-5">
            <div class="card shadow-sm border-1 border-dark rounded-lg">
                <div class="text-center fw-bold">
                    CENTRAL MANAGEMENT KOPERASI
                    <button class="btn-xs btn-close float-end" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-header justify-content-center text-center" style="background-color:#4FC3F7;">
                    <h3 class="fw-light fw-bold my-1">CMK</h3>
                </div>
                <div class="card-body">
                    <form action="/user/{{ $user->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="Name">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name, old('name')}}" id="Name" type="text" placeholder="Input Nama lengkap"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="userName">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username, old('username')}}" id="userName" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email, old('email')}}" id="email" type="email"/>
                                    <div class="">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputDivisi">Divisi</label>
                                    <input class="form-control @error('divisi') is-invalid @enderror" name="divisi" value="{{ $user->divisi, old('divisi')}}" id="inputDivisi" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputJabatan">Jabatan</label>
                                    <input class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ $user->jabatan, old('jabatan')}}" id="inputJabatan" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFlag">Flag</label>
                                    <input class="form-control @error('flag') is-invalid @enderror" name="flag" value="{{ $user->flag, old('flag')}}" id="inputFlag" type="text"/>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $user->password, old('password')}}" id="inputPassword" type="password"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                    <input class="form-control" id="inputConfirmPassword" type="password"/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Update</button>
                        <a href="/user" class="btn btn-warning btn-block btn-sm float-end me-2">kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
