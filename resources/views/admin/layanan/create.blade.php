<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate">
    <i class="fas fa-plus"></i>
    <span class="d-none d-sm-inline"> {{ __('Tambah') }}</span>
</button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.layanan.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Tambah Data layanan') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama layanan') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Masukkan nama layanan" name="name" id="name"
                                   value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jenis layanan') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror"
                                   placeholder="Surat/Formulir" name="type" id="type"
                                   value="{{ old('type') }}" required>
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tipe dokumen') }}<span class="text-danger">*</span></label>
                            <select class="form-control @error('linkType') is-invalid @enderror" name="linkType" id="linkType">
                                <option value="" selected disabled>Pilih tipe dokumen</option>
                                <option value="url" {{ old('linkType') == 'url' ? 'selected' : '' }}>Url</option>
                                <option value="file" {{ old('linkType') == 'file' ? 'selected' : '' }}>File</option>
                            </select>
                            @error('linkType')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3" id="fileGroup" style="display: none;">
                            <label class="form-label">{{ __('File') }}<span class="text-danger">*</span></label>
                            <input type="file" accept=".pdf,.doc,.docx"
                                   class="form-control @error('file') is-invalid @enderror" name="file" id="file">
                            <small class="text-muted">Format: PDF, DOC, DOCX. Maksimal 10MB</small>
                            @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3" id="linkGroup" style="display: none;">
                            <label class="form-label">{{ __('Link') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                   placeholder="https://google.com" name="link" id="link" value="{{ old('link') }}">
                            @error('link')
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const linkTypeSelect = document.getElementById("linkType");
        const fileGroup = document.getElementById("fileGroup");
        const linkGroup = document.getElementById("linkGroup");

        function toggleFields() {
            const selectedType = linkTypeSelect.value;

            fileGroup.style.display = "none";
            linkGroup.style.display = "none";

            if (selectedType === "url") {
                linkGroup.style.display = "block";
            } else if (selectedType === "file") {
                fileGroup.style.display = "block";
            }
        }

        linkTypeSelect.addEventListener("change", toggleFields);
        toggleFields();
    });
</script>
