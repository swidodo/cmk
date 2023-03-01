@extends('layout.main')
@section('main-content')
<main>
    <div class="container-xl px-4 mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm border-1 border-dark rounded-lg">
                    <div class="text-center fw-bold">
                        CENTRAL MANAGEMENT KOPERASI
                    </div>
                    <div class="card-header justify-content-center text-center" style="background-color:#4FC3F7;">
                        <h3 class="fw-light fw-bold my-1">CMK</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/group_application/{{$group->id}}">
                            @csrf
                            @method('PUT')
                            <div class="row gx-3">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputgroup">Nama Group</label>
                                    <input type="text" class="form-control @error('group_name') is-invalid @enderror" name="group_name" value="{{ $group->group_name, old('group_name')}}" placeholder="Input group name">
                                    <div id="err_group_name" class="invalid-feedback">
                                        @error('group_name') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputdescription">Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description">{{ $group->description, old('description')}}</textarea>
                                    <div id="err_description" class="invalid-feedback">
                                        @error('description') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <a href="/group_application" class="btn btn-warning btn-block btn-sm float-end">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-block btn-sm float-end me-1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
