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
                            <label class="form-label">{{ __('Kelas') }}</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror"
                                placeholder="RA" name="class" id="class" value="{{ old('class', $matkul->class) }}" required>
                            @error('class')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Ruangan') }}</label>
                            <input type="text" class="form-control @error('room') is-invalid @enderror"
                                placeholder="GK1-112" name="room" id="room" value="{{ old('room', $matkul->room) }}" required>
                            @error('room')
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
                            <label class="form-label">{{ __('Hari Pelaksanaan') }}</label>
                            <select name="day" class="form-select" id="day">
                                @foreach ($days as $day)
                                    <option value="{{ $day }}" {{ old('day', $matkul->day) == $day ? 'selected' : '' }}>
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
                            <label class="form-label">{{ __('Jam Mulai') }}</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                placeholder="" name="start_time" id="start_time" value="{{ old('start_time', $matkul->start_time) }}" required>
                            @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jam Selesai') }}</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                placeholder="" name="end_time" id="end_time" value="{{ old('end_time', $matkul->end_time) }}" required>
                            @error('end_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama Dosen') }}</label>
                            <select name="lecture" class="form-select" id="lecture">
                                @foreach ($lectures as $lecture)
                                    <option value="{{ $lecture->id }}" {{ old('lecture', $matkul->lecture) == $lecture->id ? 'selected' : '' }}>{{ $lecture->name }}</option>
                                @endforeach
                            </select>
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
