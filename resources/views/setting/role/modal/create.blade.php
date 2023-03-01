<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="ModalCreateRole" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                            <form action="/role" method="post">
                                @csrf
                                <div class="row gx-3">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputGroup">Group Akses</label>
                                        <input class="form-control" id="inputGroup" type="text" placeholder="Enter group akses" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputdeskripsi">Deskripsi</label>
                                        <textarea class="form-control" rows="4"></textarea>
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
