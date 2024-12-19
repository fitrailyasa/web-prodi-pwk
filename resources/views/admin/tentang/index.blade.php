<x-admin-table>
    <!-- Title -->
    <x-slot name="title">
        Profile
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.tentang.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.tentang.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.tentang.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.tentang.deleteAll') --}}
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('layouts.admin.search')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Visi') }}</th>
                <th>{{ __('Misi') }}</th>
                <th>{{ __('Tujuan') }}</th>
                <th>{{ __('Total Dosen') }}</th>
                <th>{{ __('Total Mahasiswa') }}</th>
                <th>{{ __('Total Tenaga Kependidikan') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tentangs as $tentang)
                <tr @if ($tentang) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $tentang->vision ?? '-' }}</td>
                    <td>{!! $tentang->mission !!}</td>
                    <td>{!! $tentang->goals !!}</td>
                    <td>{{ $tentang->total_lecture ?? '-' }}</td>
                    <td>{{ $tentang->total_student ?? '-' }}</td>
                    <td>{{ $tentang->total_teaching_staff ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.tentang.edit')
                            @include('admin.tentang.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tentangs->appends(['perPage' => $perPage, 'search' => $search])->links() }}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    // Inisialisasi CKEditor untuk misi dan tujuan dengan dukungan unggah gambar
    ClassicEditor
        .create(document.querySelector('#create_mission'), {
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
        .create(document.querySelector('#create_goals'), {
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

</x-admin-table>
