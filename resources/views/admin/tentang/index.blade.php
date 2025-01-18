<x-admin-layout>
    <!-- Title -->
    <x-slot name="title">
        Edit Profile
    </x-slot>

    <form method="POST" action="{{ route('admin.tentang.update', $tentang->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-body text-left">
            <div class="row">
                <!-- Nama -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Nama') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $tentang->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Vision -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Visi') }}</label>
                        <textarea class="form-control @error('vision') is-invalid @enderror" name="vision" rows="3" required>{{ old('vision', $tentang->vision) }}</textarea>
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
                <div class="col-md-4">
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
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Jumlah Tendik') }}</label>
                        <input type="number" class="form-control @error('total_teaching_staff') is-invalid @enderror"
                            name="total_teaching_staff"
                            value="{{ old('total_teaching_staff', $tentang->total_teaching_staff) }}">
                        @error('total_teaching_staff')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('Simpan') }}</button>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#edit_mission'), {
            ckfinder: {
                uploadUrl: '{{route('admin.tentang.upload_image').'?_token='.csrf_token()}}',
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
                uploadUrl: '{{route('admin.tentang.upload_image').'?_token='.csrf_token()}}',
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
