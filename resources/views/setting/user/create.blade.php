@extends('layout.main')
@section('main-content')
<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-5">
            <div class="card shadow-lg border-1 border-dark rounded-lg">
                <div class="text-center fw-bold">
                    CENTRAL MANAGEMENT KOPERASI
                </div>
                <div class="card-header justify-content-center text-center" style="background-color:#4FC3F7;">
                    <h3 class="fw-light fw-bold my-1">CMK</h3>
                </div>
                <div class="card-body">
                    <form action="/user" method="post">
                        @csrf
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="Name">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="Name" type="text" placeholder="Input Nama lengkap" autocomplete="false" autofocus/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="userName">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" id="userName" type="text" placeholder="Input Username" autocomplete="false"/>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" type="email" aria-describedby="emailHelp" placeholder="Input email address" autocomplete="false"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputDivisi">Divisi</label>
                                    <input class="form-control @error('divisi') is-invalid @enderror" name="divisi" value="{{ old('divisi') }}" id="inputDivisi" type="text" aria-describedby="divisiHelp" placeholder="Input Divisi" autocomplete="false"/>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputJabatan">Jabatan</label>
                                    <input class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" id="inputJabatan" type="text" aria-describedby="jabatanHelp" placeholder="Input Jabatan" autocomplete="false"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFlag">Flag</label>
                                    <input class="form-control @error('flag') is-invalid @enderror" name="flag" value="{{ old('flag') }}" id="inputFlag" type="text" aria-describedby="flagHelp" placeholder="Input Flag" autocomplete="false"/>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password" id="inputPassword" type="password" placeholder="Input password" autocomplete="false"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                    <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm password" autocomplete="false"/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()

