<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $jadwal->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $jadwal->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id) }}"
                    enctype="multipart/form-data">
                @elseif (auth()->user()->role == 'dosen')
                    <form method="POST" action="{{ route('dosen.jadwal.update', $jadwal->id) }}"
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
                            <label class="form-label">{{ __('Mata Kuliah') }}</label>
                            <select class="form-select @error('matkul_id') is-invalid @enderror" name="matkul_id"
                                id="matkul_id">
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($matkuls as $matkul)
                                    <option value="{{ $matkul->id }}"
                                        {{ $jadwal->matkul_id == $matkul->id ? 'selected' : '' }}>
                                        {{ $matkul->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('matkul_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Hari') }}</label>
                            <select class="form-select @error('day') is-invalid @enderror" name="day"
                                id="day">
                                <option value="">-- Pilih Hari --</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day }}" {{ $jadwal->day == $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                            @error('day')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Waktu Mulai') }}</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                name="start_time" id="start_time" value="{{ old('start_time', $jadwal->start_time) }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Waktu Selesai') }}</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                name="end_time" id="end_time" value="{{ old('end_time', $jadwal->end_time) }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Dosen') }}</label>
                            <select class="form-select @error('lecture') is-invalid @enderror" name="lecture"
                                id="lecture">
                                <option value="">-- Pilih Dosen --</option>
                                @foreach ($lectures as $lecture)
                                    <option value="{{ $lecture->id }}"
                                        {{ old('lecture', $jadwal->lecture) == $lecture->id ? 'selected' : '' }}>
                                        {{ $lecture->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lecture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Ruangan') }}</label>
                            <input type="text" class="form-control @error('room') is-invalid @enderror"
                                name="room" id="room" placeholder="GK1-111"
                                value="{{ old('room', $jadwal->room) }}" required>
                            @error('room')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Kelas') }}</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror"
                                name="class" id="class" placeholder="RA"
                                value="{{ old('class', $jadwal->class) }}" required>
                            @error('class')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
