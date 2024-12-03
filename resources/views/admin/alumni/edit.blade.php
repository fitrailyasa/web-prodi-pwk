<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $alumni->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $alumni->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.alumni.update', $alumni->id) }}"
                    enctype="multipart/form-data">
            @endif
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data Alumni') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">

                    <!-- Nama -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama" name="name" id="name"
                                value="{{ old('name', $alumni->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tahun Masuk (Class Year) -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tahun Masuk') }}</label>
                            <input type="number" class="form-control @error('class_year') is-invalid @enderror"
                                placeholder="Tahun Masuk" name="class_year" id="class_year"
                                value="{{ old('class_year', $alumni->class_year) }}" required>
                            @error('class_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tahun Lulus (Graduation Year) -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tahun Lulus') }}</label>
                            <input type="number" class="form-control @error('graduation_year') is-invalid @enderror"
                                placeholder="Tahun Lulus" name="graduation_year" id="graduation_year"
                                value="{{ old('graduation_year', $alumni->graduation_year) }}" required>
                            @error('graduation_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Pekerjaan (Work) -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Pekerjaan') }}</label>
                            <input type="text" class="form-control @error('work') is-invalid @enderror"
                                placeholder="Pekerjaan" name="work" id="work"
                                value="{{ old('work', $alumni->work) }}">
                            @error('work')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Gambar (Image) -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Gambar') }}</label>
                            <input id="image-input" accept="image/*" type="file"
                                class="form-control @error('img') is-invalid @enderror" name="img">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Preview Gambar -->
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            @if ($alumni->img)
                                <img class="img-fluid py-3" id="image-preview" width="200px"
                                    src="{{ asset('assets/img/' . $alumni->img) }}" alt="{{ $alumni->name }}">
                            @else
                                <img class="img-fluid py-3" id="image-preview" width="200px"
                                    src="{{ asset('assets/profile/default.png') }}" alt="Image Preview">
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
