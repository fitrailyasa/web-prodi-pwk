<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $publikasi->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $publikasi->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'dosen')
                <form method="POST" action="{{ route('dosen.publikasi.update', $publikasi->id) }}"
                    enctype="multipart/form-data">
            @endif
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="nama" name="title" id="title"
                                value="{{ old('title', $publikasi->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tipe') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror"
                                placeholder="tipe" name="type" id="type"
                                value="{{ old('type', $publikasi->type) }}" required>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tahun') }}<span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror"
                                placeholder="tahun" name="year" id="year"
                                value="{{ old('year', $publikasi->year) }}" required>
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Penerbit') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror"
                                placeholder="penerbit" name="publisher" id="publisher"
                                value="{{ old('publisher', $publikasi->publisher) }}" required>
                            @error('publisher')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Link') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                placeholder="link" name="link" id="link"
                                value="{{ old('link', $publikasi->link) }}" required>
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Deskripsi') }}<span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="deskripsi" name="description"
                                id="description">{{ old('description', $publikasi->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('Simpan') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
