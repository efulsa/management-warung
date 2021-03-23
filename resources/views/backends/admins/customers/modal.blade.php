<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Tambah Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-customer" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Isikan nama">
                            </div>
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Isikan email">
                            </div>
                            <span id="invalid-feedback" class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="password-hide">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Isikan password">
                            </div>
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                        <div class="col mt-4 pt-1">
                            <input type="hidden" name="id" id="id-customer" value="">
                            <input type="hidden" id="url-customer-store" value="{{ route('admin.user.store') }}">
                            <input type="hidden" id="url-customer-show" value="{{ route('admin.user.show') }}">
                            <input type="hidden" id="url-customer-detail" value="{{ route('admin.user.detail') }}">
                            <input type="hidden" id="url-customer-edit" value="{{ route('admin.user.edit') }}">
                            <input type="hidden" id="url-customer-update" value="{{ route('admin.user.update') }}">
                            <input type="hidden" id="url-customer-delete" value="{{ route('admin.user.delete') }}">
                            <input type="hidden" name="action" id="action" value="create">
                            <button id="btn-submit" type="submit" class="btn btn-block btn-primary" value="create"><i id="btn-loading" class="fa "></i> Simpan</button>
                            <a id="btn-detail"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
