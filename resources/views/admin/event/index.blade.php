<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Event
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.event.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.event.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.event.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.event.deleteAll') --}}
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
                <th>{{ __('Judul Event') }}</th>
                {{-- <th>{{ __('Konten Event') }}</th> --}}
                <th>{{ __('Status') }}</th>
                <th>{{ __('Tanggal Pelaksanaan') }}</th>
                <th>{{ __('Tanggal Publikasi') }}</th>
                <th>{{ __('Tag') }}</th>
                <th>{{ __('Oleh') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr @if ($event) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $event->name ?? '-' }}</td>
                    {{-- <td>{!! $event->desc !!}</td> --}}
                    <td>
                        @if ($event->status == 'unpublish')
                            <span class="badge bg-secondary">Unpublished</span>
                        @else
                            <span class="badge bg-primary">Published</span>
                        @endif
                    </td>
                    <td>{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->translatedFormat('l, d F Y') : '-' }}
                    </td>
                    <td>{{ $event->publish_date ? \Carbon\Carbon::parse($event->publish_date)->translatedFormat('l, d F Y') : '-' }}
                    </td>
                    <td>{{ $event->tag->name ?? '-' }}</td>
                    <td>{{ $event->user->name ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.event.edit')
                            @include('admin.event.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->appends(['perPage' => $perPage, 'search' => $search])->links() }}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        // Inisialisasi CKEditor untuk deskripsi
        ClassicEditor
        .create(document.querySelector('#create_desc'), {
            ckfinder: {
                uploadUrl: '{{route('admin.event.upload_image').'?_token='.csrf_token()}}',
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
                uploadUrl: '{{route('admin.event.upload_image').'?_token='.csrf_token()}}',
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
