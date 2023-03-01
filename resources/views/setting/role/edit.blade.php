@extends('layout.main')
@section('main-content')
<div class="container-fluid px-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 mt-5">
            <div class="card shadow-sm border-1 border-dark rounded-lg">
                <div class="text-center fw-bold">
                    CENTRAL MANAGEMENT KOPERASI
                </div>
                <div class="card-header justify-content-center text-center" style="background-color:#4FC3F7;">
                    <h3 class="fw-light fw-bold my-1">CMK</h3>
                </div>
                <div class="card-body">
                    <form action="/role/{{ $role->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row gx-3">
                            <div class="mb-3">
                                <label class="small mb-1" for="inputGroup">Group Akses</label>
                                <input class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $role->type, old('type') }}" id="inputGroup" type="text" placeholder="Enter group akses" />
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputdeskripsi">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ $role->description, old('description') }}</textarea>
                            </div>
                        </div>
                        <a href="/role" class="btn btn-warning btn-block btn-sm float-end">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end me-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
