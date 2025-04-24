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
                <th>{{ __('Thumbnail') }}</th>
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
                    <td>
                        @if ($berita->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $berita->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $berita->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $berita->img) }}"
                                    alt="{{ $berita->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $berita->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $berita->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $berita->img) }}"
                                                        alt="{{ $berita->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $berita->img) }}"
                                                        download="{{ $berita->img }}"
                                                        class="btn btn-success mt-2 col-12">Download
                                                        Gambar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
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
                uploadUrl: '{{route('admin.berita.upload_image').'?_token='.csrf_token()}}',
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
                uploadUrl: '{{route('admin.berita.upload_image').'?_token='.csrf_token()}}',
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
