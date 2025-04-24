<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Modul Kuliah
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.modul.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.modul.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.modul.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        @include('admin.modul.deleteAll')
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
                <th>{{ __('Nama') }}</th>
                <th>{{ __('Mata Kuliah') }}</th>
                <th>{{ __('Gambar') }}</th>
                <th>{{ __('File') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moduls as $modul)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>
                        <strong>{{ $modul->name }}</strong>
                    </td>
                    <td>
                        {{ $modul->matkul->name ?? '-' }}
                    </td>
                    <td>
                        @if ($modul->img)
                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $modul->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $modul->img) }}"
                                    alt="{{ $modul->name }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal Gambar -->
                            <div class="modal fade" id="imageModal{{ $modul->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $modul->name }}</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img class="img-fluid" src="{{ asset('storage/' . $modul->img) }}"
                                                alt="{{ $modul->name }}">
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ asset('storage/' . $modul->img) }}"
                                                download="{{ $modul->name }}.jpg" class="btn btn-success">
                                                <i class="fas fa-download"></i> Download Gambar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($modul->file)
                            <a href="{{ asset('storage/' . $modul->file) }}" target="_blank"
                                class="btn btn-sm btn-info">
                                <i class="fas fa-file"></i> Lihat File
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.modul.edit')
                            @include('admin.modul.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $moduls->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
