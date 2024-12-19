<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate">
    <i class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Tambah') }}</span>
</button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.tentang.store') }}" enctype="multipart/form-data">
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
                    <!-- Nama -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nama') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama" name="name" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Visi') }}</label>
                            <textarea class="form-control @error('vision') is-invalid @enderror" placeholder="Visi" name="vision" id="vision"
                                rows="3">{{ old('vision') }}</textarea>
                            @error('vision')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Mission -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Misi') }}</label>
                            <textarea class="form-control @error('mission') is-invalid @enderror" placeholder=""
                                name="mission" id="create_mission">{{ old('mission') }}</textarea>
                            @error('mission')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Goals -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Tujuan') }}</label>
                            <textarea class="form-control @error('goals') is-invalid @enderror" placeholder=""
                                name="goals" id="create_goals">{{ old('goals') }}</textarea>
                            @error('goals')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Total Lecture -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jumlah Dosen') }}</label>
                            <input type="number" class="form-control @error('total_lecture') is-invalid @enderror"
                                placeholder="Jumlah Dosen" name="total_lecture" id="total_lecture"
                                value="{{ old('total_lecture') }}">
                            @error('total_lecture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Total Student -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jumlah Mahasiswa') }}</label>
                            <input type="number" class="form-control @error('total_student') is-invalid @enderror"
                                placeholder="Jumlah Mahasiswa" name="total_student" id="total_student"
                                value="{{ old('total_student') }}">
                            @error('total_student')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Total Teaching Staff -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jumlah Staf Pengajar') }}</label>
                            <input type="number" class="form-control @error('total_teaching_staff') is-invalid @enderror"
                                placeholder="Jumlah Staf Pengajar" name="total_teaching_staff" id="total_teaching_staff"
                                value="{{ old('total_teaching_staff') }}">
                            @error('total_teaching_staff')
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
