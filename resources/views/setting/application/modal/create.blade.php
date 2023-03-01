<div class="modal fade" id="ModalCreateApplication" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-modal">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-1 border-dark rounded-lg">
                        <div class="text-center fw-bold">
                            CENTRAL MANAGEMENT KOPERASI
                            <button class="btn-xs btn-close float-end" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <input class="form-control" id="inputapliksi" type="text" name="name" placeholder="Input nama aplikasi" />
                                            <div id="err_name" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputgroup">Group Aplikasi</label>
                                            <select class="form-select" name="group_application_id" id="group_application_id">
                                                <option value="">--pilih--</option>
                                               @foreach ($group as $groups)
                                               <option value="{{$groups->id}}">{{ $groups->group_name }}</option>
                                               @endforeach
                                            </select>
                                            <div id="err_group_id" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="directory">Folder</label>
                                            <input class="form-control" id="directory" type="text" name="directory" placeholder="Input folder" />
                                            <div id="err_directory" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="description">Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Input deskripsi"></textarea>
                                            <div id="err_description" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="status">Status</label>
                                            <select class="form-control form-select" name="status" id="status">
                                                <option value="">--pilih--</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Non Aktif</option>
                                            </select>
                                            <div id="err_status" class="invalid-feedback"></div>
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
    </div>
</div>


