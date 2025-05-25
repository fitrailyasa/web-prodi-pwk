<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Tambah') }}</span></button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.modul.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Tambah Data Modul') }}</h5>
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
                                value="{{ old('name') }}" required>
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
                                        {{ old('matkul_id') == $matkul->id ? 'selected' : '' }}>
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
