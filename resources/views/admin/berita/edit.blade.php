<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $berita->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $berita->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.berita.update', $berita->id) }}"
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
                            <label class="form-label">{{ __('Judul Berita') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Judul Berita" name="name" id="name"
                                value="{{ old('name', $berita->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Konten Berita') }}<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="deskripsi..." name="desc"
                                id="edit_desc_{{ $berita->id }}">{{ old('desc', $berita->desc) }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tanggal Pelaksanaan') }}<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('event_date') is-invalid @enderror"
                                placeholder="Tanggal Pelaksanaan" name="event_date" id="event_date"
                                value="{{ old('event_date', $berita->event_date) }}" required>
                            @error('event_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tanggal Publikasi') }}<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('publish_date') is-invalid @enderror"
                                placeholder="Tanggal Publikasi" name="publish_date" id="publish_date"
                                value="{{ old('publish_date', $berita->publish_date) }}" required>
                            @error('publish_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Status') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status"
                                id="status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="publish"
                                    {{ old('status', $berita->status ?? '') == 'publish' ? 'selected' : '' }}>
                                    Publish
                                </option>
                                <option value="unpublish"
                                    {{ old('status', $berita->status ?? '') == 'unpublish' ? 'selected' : '' }}>
                                    Unpublish
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tag Berita') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('tag_id') is-invalid @enderror" name="tag_id"
                                id="tag_id" required>
                                <option value="">-- Pilih Tag --</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ old('tag_id', $berita->tag_id ?? '') == $tag->id ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tag_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Gambar (Image) -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Gambar') }}<span class="text-danger">*</span></label>
                            <input id="image-input-{{ $berita->id }}" accept="image/*" type="file"
                                class="form-control @error('img') is-invalid @enderror" name="img">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Preview Gambar -->
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <img class="img-fluid py-3" id="image-preview-{{ $berita->id }}" width="200px"
                                src="{{ $berita->img ? asset('storage/' . $berita->img) : asset('assets/profile/default.png') }}"
                                alt="Image Preview">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                    {{ __('Simpan') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview
        document.getElementById('image-input-{{ $berita->id }}').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview-{{ $berita->id }}').src = e.target
                        .result;
                }
                reader.readAsDataURL(file);
            }
        });

        // CKEditor: Inisialisasi saat modal dibuka
        let editorInstance = null;
        $('.formEdit{{ $berita->id }}').on('shown.bs.modal', function() {
            if (!editorInstance) {
                ClassicEditor
                    .create(document.querySelector('#edit_desc_{{ $berita->id }}'), {
                        ckfinder: {
                            uploadUrl: '{{ route('admin.berita.upload_image') . '?_token=' . csrf_token() }}',
                        },
                        toolbar: {
                            items: [
                                'heading', '|', 'bold', 'italic', 'link', '|',
                                'bulletedList', 'numberedList', '|', 'imageUpload',
                                'blockQuote', 'insertTable', 'undo', 'redo'
                            ]
                        },
                        removePlugins: ['MediaEmbed']
                    })
                    .then(editor => {
                        editorInstance = editor;
                        editor.ui.getEditableElement().style.minHeight = '300px';
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });

        // Reset editor saat modal ditutup
        $('.formEdit{{ $berita->id }}').on('hidden.bs.modal', function() {
            if (editorInstance) {
                editorInstance.setData(`{!! old('desc', $berita->desc) !!}`);
            }
        });
    });
</script>
