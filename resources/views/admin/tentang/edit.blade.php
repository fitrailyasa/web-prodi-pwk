<!-- Tombol untuk membuka modal Edit -->
<button role="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#formEdit{{ $tentang->id }}">
    <i class="fas fa-edit"></i> Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="formEdit{{ $tentang->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.tentang.update', $tentang->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">{{ __('Edit Data') }}</h5>
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
                                    name="name" value="{{ old('name', $tentang->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Vision -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Visi') }}</label>
                                <textarea class="form-control @error('vision') is-invalid @enderror" name="vision" rows="3"
                                    required>{{ old('vision', $tentang->vision) }}</textarea>
                                @error('vision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mission -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Misi') }}</label>
                                <textarea class="form-control @error('mission') is-invalid @enderror" name="mission" id="edit_mission" rows="3"
                                    required>{{ old('mission', $tentang->mission) }}</textarea>
                                @error('mission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Goals -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Tujuan') }}</label>
                                <textarea class="form-control @error('goals') is-invalid @enderror" name="goals" id="edit_goals" rows="3"
                                    required>{{ old('goals', $tentang->goals) }}</textarea>
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
                                    name="total_lecture" value="{{ old('total_lecture', $tentang->total_lecture) }}">
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
                                    name="total_student" value="{{ old('total_student', $tentang->total_student) }}">
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
                                    name="total_teaching_staff" value="{{ old('total_teaching_staff', $tentang->total_teaching_staff) }}">
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
