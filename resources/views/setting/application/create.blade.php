@extends('layout.main')
@section('main-content')
<main>
    <div class="container-xl px-4 mt-4">
        <div class="container justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm border-1 border-dark rounded-lg">
                    <div class="text-center fw-bold">
                        CENTRAL MANAGEMENT KOPERASI
                    </div>
                    <div class="card-header justify-content-center text-center" style="background-color:#4FC3F7;">
                        <h3 class="fw-light fw-bold my-1">CMK</h3>
                    </div>
                    <div class="card-body">
                    <form id="form_create_application" method="POST" action="/application">
                        @csrf
                            <div class="row gx-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputapliksi">Nama Aplikasi</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id="inputapliksi" type="text" name="name" value="{{ old('name') }}" placeholder="Input nama aplikasi" />
                                        <div id="err_name" class="invalid-feedback">
                                            @error('name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputgroup">Group Aplikasi</label>
                                        <select class="form-select @error('group_application_id') is-invalid @enderror" name="group_application_id" id="group_application_id">
                                            <option value="">--pilih--</option>
                                            @foreach ($group as $groups)
                                            <option value="{{$groups->id}}" {{ ( $groups->id == old('group_application_id')) ? 'selected' : '' }}>{{ $groups->group_name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="err_group_id" class="invalid-feedback">
                                            @error('group_application_id') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="directory">Folder</label>
                                        <input class="form-control @error('directory') is-invalid @enderror" id="directory" type="text" name="directory" value="{{ old('directory') }}" placeholder="Input folder" />
                                        <div id="err_directory" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="description">Deskripsi</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Input deskripsi">{{ old('description') }}</textarea>
                                        <div id="err_description" class="invalid-feedback">
                                            @error('description') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="status">Status</label>
                                        <select class="form-control form-select @error('status') is-invalid @enderror" name="status" id="status">
                                            <option value="">--pilih--</option>
                                            <option value="1" @if (old('status') == '1') selected="selected" @endif>Aktif</option>
                                            <option value="0"  @if (old('status') == '0') selected="selected" @endif>Non Aktif</option>
                                        </select>
                                        <div id="err_status" class="invalid-feedback">
                                            @error('status') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection()


