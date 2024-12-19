<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Berita
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.berita.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.berita.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.berita.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.berita.deleteAll') --}}
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
                <th>{{ __('Judul Berita') }}</th>
                <th>{{ __('Konten Berita') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Tanggal Pelaksanaan') }}</th>
                <th>{{ __('Tanggal Publikasi') }}</th>
                <th>{{ __('Tag') }}</th>
                <th>{{ __('Oleh') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $berita)
                <tr @if ($berita) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $berita->name ?? '-' }}</td>
                    <td>{!! $berita->desc !!}</td>
                    <td>
                        @if ($berita->status == 'unpublish')
                            <span class="badge bg-secondary">Unpublished</span>
                        @else
                            <span class="badge bg-primary">Published</span>
                        @endif
                    </td>
                    <td>{{ $berita->event_date ? \Carbon\Carbon::parse($berita->event_date)->translatedFormat('l, d F Y') : '-' }}
                    </td>
                    <td>{{ $berita->publish_date ? \Carbon\Carbon::parse($berita->publish_date)->translatedFormat('l, d F Y') : '-' }}
                    </td>
                    <td>{{ $berita->tag->name ?? '-' }}</td>
                    <td>{{ $berita->user->name ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.berita.edit')
                            @include('admin.berita.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $beritas->appends(['perPage' => $perPage, 'search' => $search])->links() }}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        // Inisialisasi CKEditor untuk deskripsi
        ClassicEditor
        .create(document.querySelector('#create_desc'), {
            ckfinder: {
                uploadUrl: '{{ route('admin.berita.upload_image') }}',
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
        .create(document.querySelector('#edit_desc'), {
            ckfinder: {
                uploadUrl: '{{ route('admin.berita.upload_image') }}',
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
