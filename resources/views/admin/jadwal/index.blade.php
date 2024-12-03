<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Jadwal Kuliah
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.jadwal.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.jadwal.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.jadwal.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.jadwal.deleteAll') --}}
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
                <th>{{ __('Gambar') }}</th>
                <th>{{ __('Deskripsi') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr @if ($jadwal) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $jadwal->name ?? '-' }}</td>
                    <td>
                        @if ($jadwal->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $jadwal->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $jadwal->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $jadwal->img) }}"
                                    alt="{{ $jadwal->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $jadwal->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $jadwal->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('assets/img/' . $jadwal->img) }}"
                                                        alt="{{ $jadwal->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $jadwal->img) }}"
                                                        download="{{ $jadwal->img }}"
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
                    <td>{{ $jadwal->desc ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'dosen')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.jadwal.edit')
                            @include('admin.jadwal.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $jadwals->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
