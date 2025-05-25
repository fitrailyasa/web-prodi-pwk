<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $layanan->id }}">
    <i class="fas fa-edit"></i>
    <span class="d-none d-sm-inline">{{ __('Edit') }}</span>
</button>

<!-- Modal -->
<div class="modal fade formEdit{{ $layanan->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.layanan.update', $layanan->id) }}"
                    enctype="multipart/form-data">
            @endif
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Data layanan') }}</h5>
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
                                   name="name" placeholder="Masukkan nama layanan" value="{{ old('name', $layanan->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jenis layanan') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror"
                                   name="type" placeholder="Surat/Formulir" value="{{ old('type', $layanan->type) }}" required>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tipe dokumen') }}<span class="text-danger">*</span></label>
                            <select class="form-control @error('linkType') is-invalid @enderror"
                                    name="linkType" id="linkType{{ $layanan->id }}">
                                <option value="" disabled {{ old('linkType', $layanan->linkType) ? '' : 'selected' }}>Pilih tipe dokumen</option>
                                <option value="url" {{ old('linkType', $layanan->linkType) == 'url' ? 'selected' : '' }}>Url</option>
                                <option value="file" {{ old('linkType', $layanan->linkType) == 'file' ? 'selected' : '' }}>File</option>
                            </select>
                            @error('linkType')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3" id="fileGroup{{ $layanan->id }}" style="display: none;">
                            <label class="form-label">{{ __('File') }}<span class="text-danger">*</span></label>
                            <input type="file" accept=".pdf,.doc,.docx"
                                   class="form-control @error('file') is-invalid @enderror" name="file">
                            <small class="text-muted">Format: PDF, DOC, DOCX. Maksimal 10MB</small>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3" id="linkGroup{{ $layanan->id }}" style="display: none;">
                            <label class="form-label">{{ __('Link') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                   name="link" placeholder="https://google.com" value="{{ old('link', $layanan->link) }}">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('Simpan') }}
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @foreach($layanans as $layanan)
            (function () {
                const id = {{ $layanan->id }};
                const linkTypeSelect = document.getElementById("linkType" + id);
                const fileGroup = document.getElementById("fileGroup" + id);
                const linkGroup = document.getElementById("linkGroup" + id);

                if (!linkTypeSelect) return;

                const fileInput = fileGroup.querySelector('input[type="file"]');
                const linkInput = linkGroup.querySelector('input[type="text"]');

                function toggleFields() {
                    const selectedType = linkTypeSelect.value;

                    fileGroup.style.display = "none";
                    linkGroup.style.display = "none";
                    fileInput.removeAttribute("required");
                    linkInput.removeAttribute("required");

                    if (selectedType === "url") {
                        linkGroup.style.display = "block";
                        linkInput.setAttribute("required", "required");
                    } else if (selectedType === "file") {
                        fileGroup.style.display = "block";
                        fileInput.setAttribute("required", "required");
                    }
                }

                linkTypeSelect.addEventListener("change", toggleFields);
                toggleFields();
            })();
        @endforeach
    });
</script>
