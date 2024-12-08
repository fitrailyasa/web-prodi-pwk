<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $matkul->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $matkul->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.matkul.update', $matkul->id) }}"
                    enctype="multipart/form-data">
                @elseif (auth()->user()->role == 'dosen')
                    <form method="POST" action="{{ route('dosen.matkul.update', $matkul->id) }}"
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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama Matkul') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Matematika Dasar 1B" name="name" id="name" value="{{ old('name', $matkul->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Kode Matkul') }}</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                placeholder="MA1104" name="code" id="code" value="{{ old('code', $matkul->code) }}" required>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jumlah SKS') }}</label>
                            <input type="number" class="form-control @error('credits') is-invalid @enderror"
                                placeholder="3" name="credits" id="credits" value="{{ old('credits', $matkul->credits) }}" required>
                            @error('credits')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tanggal Pelaksanaan') }}</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                placeholder="" name="date" id="date" value="{{ old('date', $matkul->date) }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama Dosen') }}</label>
                            <input type="text" class="form-control @error('lecture') is-invalid @enderror"
                                placeholder="Dr. Kurniawan, S.P.W.K., M.P.W.K." name="lecture" id="lecture" value="{{ old('lecture', $matkul->lecture) }}" required>
                            @error('lecture')
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
