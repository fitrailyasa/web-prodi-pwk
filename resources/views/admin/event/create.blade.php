<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Tambah') }}</span></button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.event.store') }}" enctype="multipart/form-data">
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
                            <label class="form-label">{{ __('Judul Event') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Judul Event" name="name" id="name" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Konten Event') }}<span class="text-danger">*</span></label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="deskripsi..." name="desc"
                                id="create_desc_event">{{ old('desc') }}</textarea>
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
                                value="{{ old('event_date') }}" required>
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
                                value="{{ old('publish_date') }}" required>
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
                                <option value="publish">Publish</option>
                                <option value="unpublish">Unpublish</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tag Event') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('tag_id') is-invalid @enderror" name="tag_id"
                                id="tag_id" required>
                                <option value="">-- Pilih Tag --</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Gambar (Image) -->
                    {{-- <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Gambar') }}<span class="text-danger">*</span></label>
                            <input id="image-input" accept="image/*" type="file"
                                class="form-control @error('img') is-invalid @enderror" name="img">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}

                    <!-- Preview Gambar -->
                    {{-- <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <img class="img-fluid py-3" id="image-preview" width="200px"
                                src="{{ asset('assets/profile/default.png') }}" alt="Image Preview">
                        </div>
                    </div> --}}
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

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    // Image preview
    document.getElementById('image-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // CKEditor
    let editor;
    ClassicEditor
        .create(document.querySelector('#create_desc_event'), {
            ckfinder: {
                uploadUrl: '{{ route('admin.event.upload_image') . '?_token=' . csrf_token() }}',
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo'
                ]
            },
            removePlugins: ['MediaEmbed']
        })
        .then(newEditor => {
            editor = newEditor;
            // Set editor height
            const editorElement = editor.ui.getEditableElement();
            editorElement.style.minHeight = '300px';
        })
        .catch(error => {
            console.error(error);
        });

    // Clean up on modal close
    document.querySelector('.formCreate').addEventListener('hidden.bs.modal', function() {
        if (editor) {
            editor.setData('');
        }
    });
</script>
