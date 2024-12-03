<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $matkul->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $matkul->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.matkul.update', $matkul->id) }}"
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
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="nama" name="name" id="name"
                                value="{{ old('name', $matkul->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Gambar') }}</label>
                            <input id="image-input" accept="image/*" type="file" id="img-input"
                                class="form-control @error('img') is-invalid @enderror" placeholder="img" name="img"
                                id="img" value="{{ old('img', $matkul->img) }}">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Deskripsi') }}</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="deskripsi" name="desc" id="desc"
                                rows="3">{{ old('desc', $matkul->desc) }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            @if ($matkul->img == null)
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/profile/default.png') }}" alt="{{ $matkul->name }}">
                            @else
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/img/' . $matkul->img) }}" alt="{{ $matkul->name }}">
                            @endif
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
