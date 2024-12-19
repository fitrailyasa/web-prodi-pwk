<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $berita->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $berita->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
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
                            <label class="form-label">{{ __('Judul Berita') }}</label>
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
                            <label class="form-label">{{ __('Konten Berita') }}</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="deskripsi..." name="desc"
                                id="edit_desc">{{ old('desc', $berita->desc) }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tanggal Pelaksanaan') }}</label>
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
                            <label class="form-label">{{ __('Tanggal Publikasi') }}</label>
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
                            <label class="form-label">{{ __('Status') }}</label>
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
                            <label class="form-label">{{ __('Tag Berita') }}</label>
                            <select class="form-select @error('tag_id') is-invalid @enderror" name="tag_id" id="tag_id"
                                required>
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
