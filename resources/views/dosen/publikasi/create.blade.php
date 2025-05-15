<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Tambah') }}</span></button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'dosen')
                <form method="POST" action="{{ route('dosen.publikasi.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Tambah Data') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama') }}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="nama" name="title" id="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tipe') }}</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror"
                                placeholder="tipe" name="type" id="type" value="{{ old('type') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tahun') }}</label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror"
                                placeholder="tahun" name="year" id="year" value="{{ old('year') }}" required>
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Penerbit') }}</label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror"
                                placeholder="penerbit" name="publisher" id="publisher" value="{{ old('publisher') }}"
                                required>
                            @error('publisher')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Link') }}</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                placeholder="link" name="link" id="link" value="{{ old('link') }}" required>
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Deskripsi') }}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="deskripsi" name="description"
                                id="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                    {{ __('Simpan') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
