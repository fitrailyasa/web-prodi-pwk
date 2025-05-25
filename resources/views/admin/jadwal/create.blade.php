<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Tambah') }}</span></button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.jadwal.store') }}" enctype="multipart/form-data">
                @elseif (auth()->user()->role == 'dosen')
                    <form method="POST" action="{{ route('dosen.jadwal.store') }}" enctype="multipart/form-data">
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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Mata Kuliah') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('matkul_id') is-invalid @enderror" name="matkul_id"
                                id="matkul_id">
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($matkuls as $matkul)
                                    <option value="{{ $matkul->id }}">{{ $matkul->name }}</option>
                                @endforeach
                            </select>
                            @error('matkul_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Hari') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('day') is-invalid @enderror" name="day"
                                id="day">
                                <option value="">-- Pilih Hari --</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                            @error('day')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Waktu Mulai') }}<span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Waktu Selesai') }}<span
                                    class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Dosen') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('lecture') is-invalid @enderror" name="lecture"
                                id="lecture">
                                <option value="">-- Pilih Dosen --</option>
                                @foreach ($lectures as $lecture)
                                    <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                                @endforeach
                            </select>
                            @error('lecture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Ruangan') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('room') is-invalid @enderror"
                                name="room" id="room" placeholder="GK1-111" value="{{ old('room') }}"
                                required>
                            @error('room')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Kelas') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror"
                                name="class" id="class" placeholder="RA" value="{{ old('class') }}" required>
                            @error('class')
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
