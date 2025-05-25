<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate">
    <i class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Tambah') }}</span>
</button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.mbkm.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormLabel">{{ __('Tambah Data') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Judul') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Judul"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Deskripsi') }}<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Benefit') }}<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="benefits" rows="3" placeholder="Enter each benefit on a new line"></textarea>
                                    <small
                                        class="form-text text-muted">{{ __('Enter each benefit on a new line') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Link') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="link" placeholder="Link"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
