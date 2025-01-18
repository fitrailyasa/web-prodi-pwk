<x-admin-layout>
    <!-- Title -->
    <x-slot name="title">
        Edit Kalender Akademik
    </x-slot>

    <form method="POST" action="{{ route('admin.kalender.update', $kalender->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-body text-left">
            <div class="row">
                <!-- File -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Edit File') }}</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file"
                            value="{{ old('file', $kalender->file) }}" required>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('Simpan') }}</button>
                </div>
                <!-- Display PDF file -->
                @if($kalender->file)
                    <div class="col-md-12">
                        <label class="form-label">Preview PDF</label>
                        <iframe src="{{ asset('storage/'.$kalender->file) }}" frameborder="0" width="100%" height="500px"></iframe>
                    </div>
                @endif
            </div>
        </div>

    </form>

</x-admin-layout>
