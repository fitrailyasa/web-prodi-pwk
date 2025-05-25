<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $modul->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $modul->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.modul.update', $modul->id) }}"
                    enctype="multipart/form-data">
            @endif
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data Modul') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama Modul') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan nama modul" name="name" id="name"
                                value="{{ old('name', $modul->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Mata Kuliah') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('matkul_id') is-invalid @enderror" name="matkul_id"
                                id="matkul_id" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($matkuls as $matkul)
                                    <option value="{{ $matkul->id }}"
                                        {{ old('matkul_id', $modul->matkul_id) == $matkul->id ? 'selected' : '' }}>
                                        {{ $matkul->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('matkul_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('File Modul') }}<span class="text-danger">*</span></label>
                            @if ($modul->file)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $modul->file) }}" target="_blank"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-file"></i> Lihat File Saat Ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" accept=".pdf,.doc,.docx"
                                class="form-control @error('file') is-invalid @enderror" name="file" id="file">
                            <small class="text-muted">Format: PDF, DOC, DOCX. Maksimal 10MB</small>
                            @error('file')
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
