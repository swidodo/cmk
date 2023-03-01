@extends('layout.main')
@section('main-content')
<div class="container-xl px-4">
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
                    <form method="POST" action="/group_user/{{ $group->id }}">
                        @csrf
                        @method('PUT')
                        <div class="row gx-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFirstName">Name</label>
                                    <select class="form-control form-select user" id="user" name="user_id">
                                        <option value="{{ $group->user_id, old('user_id') }}">{{ $group->user->username }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputLastName">Group</label>

                                    <select class="form-control form-select @error('role_id') is-invalid @enderror" name="role_id">
                                        @foreach($role as $roles)
                                            <option value="{{ $roles->id }}"
                                            @if (old('role_id') =='')
                                            {{ ($roles->role_id == $group->role_id) ? 'selected' : '' }}
                                            @else
                                            {{ ($roles->role_id == old('role_id')) ? 'selected' : '' }}
                                            @endif >{{ $roles->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-warning btn-block btn-sm float-end" href="/group_user">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end me-1">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
