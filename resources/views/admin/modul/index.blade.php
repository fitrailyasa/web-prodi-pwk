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
        {{-- @include('admin.modul.deleteAll') --}}
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
                <th>{{ __('Tautan') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moduls as $modul)
                <tr @if ($modul) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $modul->name ?? '-' }}</td>
                    <td>
                        @if ($modul->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $modul->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $modul->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $modul->img) }}"
                                    alt="{{ $modul->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $modul->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $modul->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $modul->img) }}"
                                                        alt="{{ $modul->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $modul->img) }}"
                                                        download="{{ $modul->img }}"
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
                        @if ($modul->file == null)
                            -
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModul{{ $modul->id }}">
                                {{ $modul->file }}
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModul{{ $modul->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $modul->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize">
                                                            <i class="fas fa-expand"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Embed PDF -->
                                                    <iframe class="embed-responsive-item"
                                                        src="{{ asset('storage/' . $modul->file) }}"
                                                        style="width: 100%; height: 500px;" frameborder="0">
                                                    </iframe>
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $modul->file) }}"
                                                        download="{{ $modul->file }}"
                                                        class="btn btn-success mt-2 col-12">Download PDF</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
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
