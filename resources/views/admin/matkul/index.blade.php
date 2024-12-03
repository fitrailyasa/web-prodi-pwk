<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Matkul
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.matkul.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.matkul.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.matkul.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.matkul.deleteAll') --}}
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
            @foreach ($matkuls as $matkul)
                <tr @if ($matkul) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $matkul->name ?? '-' }}</td>
                    <td>
                        @if ($matkul->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $matkul->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $matkul->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $matkul->img) }}"
                                    alt="{{ $matkul->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $matkul->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $matkul->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('assets/img/' . $matkul->img) }}"
                                                        alt="{{ $matkul->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $matkul->img) }}"
                                                        download="{{ $matkul->img }}"
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
                    <td>{{ $matkul->desc ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.matkul.edit')
                            @include('admin.matkul.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $matkuls->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
