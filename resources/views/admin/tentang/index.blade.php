<x-admin-layout>
    <x-slot name="title">
        Edit Profile Prodi
    </x-slot>

    @include('layouts.admin.alert')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tentang.update', $tentang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Judul<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $tentang->name) }}" maxlength="100" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="semester" class="form-label">Semester<span class="text-danger">*</span></label>
                        <select name="semester" class="form-select @error('semester') is-invalid @enderror"
                            id="semester">
                            <option value="ganjil"
                                {{ old('semester', $tentang->semester) == 'ganjil' ? 'selected' : '' }}>
                                Ganjil</option>
                            <option value="genap"
                                {{ old('semester', $tentang->semester) == 'genap' ? 'selected' : '' }}>Genap
                            </option>
                        </select>
                        @error('semester')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="year" class="form-label">Tahun<span class="text-danger">*</span></label>
                        <input type="text" name="year" id="year"
                            class="form-control @error('year') is-invalid @enderror" maxlength="100"
                            value="{{ old('year', $tentang->year) }}">
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Deskripsi<span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="3"
                        class="form-control @error('description') is-invalid @enderror" maxlength="1000">{{ old('description', $tentang->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="vision" class="form-label">Visi<span class="text-danger">*</span></label>
                    <textarea name="vision" id="vision" rows="3" class="form-control @error('vision') is-invalid @enderror"
                        maxlength="1000">{{ old('vision', $tentang->vision) }}</textarea>
                    @error('vision')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="edit_mission" class="form-label">Misi<span class="text-danger">*</span></label>
                    <textarea name="mission" id="edit_mission" class="form-control @error('mission') is-invalid @enderror" rows="6">{{ old('mission', is_array($tentang->mission) ? implode("\n", $tentang->mission) : $tentang->mission) }}</textarea>
                    @error('mission')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="edit_goals" class="form-label">Tujuan<span class="text-danger">*</span></label>
                    <textarea name="goals" id="edit_goals" class="form-control @error('goals') is-invalid @enderror" rows="6">{{ old('goals', is_array($tentang->goals) ? implode("\n", $tentang->goals) : $tentang->goals) }}</textarea>
                    @error('goals')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="total_lecture" class="form-label">Total Dosen<span
                                class="text-danger">*</span></label>
                        <input type="number" name="total_lecture" id="total_lecture"
                            class="form-control @error('total_lecture') is-invalid @enderror"
                            value="{{ old('total_lecture', $tentang->total_lecture) }}">
                        @error('total_lecture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="total_student" class="form-label">Total Mahasiswa<span
                                class="text-danger">*</span></label>
                        <input type="number" name="total_student" id="total_student"
                            class="form-control @error('total_student') is-invalid @enderror"
                            value="{{ old('total_student', $tentang->total_student) }}">
                        @error('total_student')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="total_teaching_staff" class="form-label">Total Tenaga Pengajar<span
                                class="text-danger">*</span></label>
                        <input type="text" name="total_teaching_staff" id="total_teaching_staff"
                            class="form-control @error('total_teaching_staff') is-invalid @enderror"
                            value="{{ old('total_teaching_staff', $tentang->total_teaching_staff) }}">
                        @error('total_teaching_staff')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="instagram_url" class="form-label">Instagram URL<span
                                class="text-danger">*</span></label>
                        <input type="url" name="instagram_url" id="instagram_url"
                            class="form-control @error('instagram_url') is-invalid @enderror" maxlength="100"
                            value="{{ old('instagram_url', $tentang->instagram_url) }}">
                        @error('instagram_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="youtube_url" class="form-label">Youtube URL<span
                                class="text-danger">*</span></label>
                        <input type="url" name="youtube_url" id="youtube_url"
                            class="form-control @error('youtube_url') is-invalid @enderror" maxlength="100"
                            value="{{ old('youtube_url', $tentang->youtube_url) }}">
                        @error('youtube_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="tiktok_url" class="form-label">Tiktok URL<span
                                class="text-danger">*</span></label>
                        <input type="url" name="tiktok_url" id="tiktok_url"
                            class="form-control @error('tiktok_url') is-invalid @enderror" maxlength="100"
                            value="{{ old('tiktok_url', $tentang->tiktok_url) }}">
                        @error('tiktok_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Nomor Telepon<span
                                class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror" maxlength="100"
                            value="{{ old('phone', $tentang->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" maxlength="100"
                            value="{{ old('email', $tentang->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="address" class="form-label">Alamat<span class="text-danger">*</span></label>
                    <input type="text" name="address" id="address"
                        class="form-control @error('address') is-invalid @enderror" maxlength="100"
                        value="{{ old('address', $tentang->address) }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mb-5">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>
