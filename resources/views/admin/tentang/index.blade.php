<x-admin-layout>
    <!-- Title -->
    <x-slot name="title">
        Edit Profile Prodi
    </x-slot>

    <form method="POST" action="{{ route('admin.tentang.update', $tentang->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if (session('alert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('alert') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="modal-body text-left">
            <div class="row">
                <!-- Informasi Dasar -->
                <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>{{ __('Informasi Dasar') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Nama -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Nama') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $tentang->name) }}" required
                                            maxlength="100">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Gambar -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Gambar') }}</label>
                                        <div class="input-group">
                                            <input type="file"
                                                class="form-control @error('img') is-invalid @enderror" name="img"
                                                accept="image/jpeg,image/png,image/jpg,image/gif">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        @error('img')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if ($tentang->img)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $tentang->img) }}" alt="Current Image"
                                                    class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Deskripsi') }}</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description', $tentang->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Semester -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Semester') }} <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('semester') is-invalid @enderror" name="semester"
                                            id="semester" required>
                                            <option value="">-- Pilih Semester --</option>
                                            <option value="ganjil" {{ $tentang->semester == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                                            <option value="genap" {{ $tentang->semester == 'genap' ? 'selected' : '' }}>Genap</option>
                                        </select>
                                        @error('semester')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tahun Ajaran -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Tahun Ajaran') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('year') is-invalid @enderror"
                                            placeholder="2024/2025" name="year" id="year" value="{{ old('year', $tentang->year) }}" required>
                                        @error('year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" name="section" value="basic" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-2">

                <!-- Visi, Misi, dan Tujuan -->
                <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-bullseye me-2"></i>{{ __('Visi, Misi, dan Tujuan') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Vision -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Visi') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('vision') is-invalid @enderror" name="vision" rows="3" required>{{ old('vision', $tentang->vision) }}</textarea>
                                        @error('vision')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Mission -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Misi') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('mission') is-invalid @enderror" name="mission" id="edit_mission" rows="3"
                                            required placeholder="Masukkan setiap misi dalam baris baru">{{ is_array(old('mission', $tentang->mission)) ? implode("\n", old('mission', $tentang->mission)) : old('mission', $tentang->mission) }}</textarea>
                                        @error('mission')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Goals -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Tujuan') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('goals') is-invalid @enderror" name="goals" id="edit_goals" rows="3"
                                            required placeholder="Masukkan setiap tujuan dalam baris baru">{{ is_array(old('goals', $tentang->goals)) ? implode("\n", old('goals', $tentang->goals)) : old('goals', $tentang->goals) }}</textarea>
                                        @error('goals')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" name="section" value="vision_mission"
                                    class="btn btn-success btn-sm">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-2">

                <!-- Statistik -->
                <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>{{ __('Statistik') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Total Lecture -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Jumlah Dosen') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control @error('total_lecture') is-invalid @enderror"
                                                name="total_lecture"
                                                value="{{ old('total_lecture', $tentang->total_lecture) }}" required
                                                min="0">
                                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                        </div>
                                        @error('total_lecture')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Total Student -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Jumlah Mahasiswa') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control @error('total_student') is-invalid @enderror"
                                                name="total_student"
                                                value="{{ old('total_student', $tentang->total_student) }}" required
                                                min="0">
                                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                        </div>
                                        @error('total_student')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Total Teaching Staff -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Jumlah Tendik') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control @error('total_teaching_staff') is-invalid @enderror"
                                                name="total_teaching_staff"
                                                value="{{ old('total_teaching_staff', $tentang->total_teaching_staff) }}"
                                                required min="0">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>
                                        @error('total_teaching_staff')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" name="section" value="statistics"
                                    class="btn btn-info btn-sm text-white">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-2">

                <!-- Informasi Kontak -->
                <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0"><i class="fas fa-address-card me-2"></i>{{ __('Informasi Kontak') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Telepon') }}</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone', $tentang->phone) }}"
                                                maxlength="20">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Email') }}</label>
                                        <div class="input-group">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email', $tentang->email) }}"
                                                maxlength="100">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Alamat') }}</label>
                                        <div class="input-group">
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="2" maxlength="255">{{ old('address', $tentang->address) }}</textarea>
                                            <span class="input-group-text"><i
                                                    class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" name="section" value="contact"
                                    class="btn btn-warning btn-sm text-dark">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-2">

                <!-- Media Sosial -->
                <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>{{ __('Media Sosial') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Instagram URL') }}</label>
                                        <div class="input-group">
                                            <input type="url"
                                                class="form-control @error('instagram_url') is-invalid @enderror"
                                                name="instagram_url"
                                                value="{{ old('instagram_url', $tentang->instagram_url) }}"
                                                maxlength="255">
                                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        @error('instagram_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('YouTube URL') }}</label>
                                        <div class="input-group">
                                            <input type="url"
                                                class="form-control @error('youtube_url') is-invalid @enderror"
                                                name="youtube_url"
                                                value="{{ old('youtube_url', $tentang->youtube_url) }}"
                                                maxlength="255">
                                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                        </div>
                                        @error('youtube_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('TikTok URL') }}</label>
                                        <div class="input-group">
                                            <input type="url"
                                                class="form-control @error('tiktok_url') is-invalid @enderror"
                                                name="tiktok_url"
                                                value="{{ old('tiktok_url', $tentang->tiktok_url) }}"
                                                maxlength="255">
                                            <span class="input-group-text"><i class="fab fa-tiktok"></i></span>
                                        </div>
                                        @error('tiktok_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" name="section" value="social_media"
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Lokasi -->
                {{-- <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0"><i class="fas fa-map me-2"></i>{{ __('Informasi Lokasi') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Latitude') }}</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('latitude') is-invalid @enderror"
                                                name="latitude" value="{{ old('latitude', $tentang->latitude) }}"
                                                maxlength="20">
                                            <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                        </div>
                                        @error('latitude')
                                            <div class="invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Longitude') }}</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('longitude') is-invalid @enderror"
                                                name="longitude" value="{{ old('longitude', $tentang->longitude) }}"
                                                maxlength="20">
                                            <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                        </div>
                                        @error('longitude')
                                            <div class="invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __('Maps URL') }}</label>
                                        <div class="input-group">
                                            <input type="url"
                                                class="form-control @error('maps_url') is-invalid @enderror"
                                                name="maps_url" value="{{ old('maps_url', $tentang->maps_url) }}"
                                                maxlength="255">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                        </div>
                                        @error('maps_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" name="section" value="location"
                                    class="btn btn-secondary btn-sm">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="modal-footer">
            <!-- Removed the save button -->
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#edit_mission'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.tentang.upload_image') . '?_token=' . csrf_token() }}',
                },
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'imageUpload',
                    'blockQuote', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#edit_goals'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.tentang.upload_image') . '?_token=' . csrf_token() }}',
                },
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'imageUpload',
                    'blockQuote', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-admin-layout>
