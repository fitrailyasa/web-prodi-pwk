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
                <th>{{ __('Nama') }}</th>
                <th>{{ __('Gambar') }}</th>
                <th>{{ __('Deskripsi') }}</th>
                <th>{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $berita)
                <tr @if ($berita) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $berita->name ?? '-' }}</td>
                    <td>
                        @if ($berita->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $berita->name }}" width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $berita->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $berita->img) }}"
                                    alt="{{ $berita->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $berita->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
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
                                                        src="{{ asset('assets/img/' . $berita->img) }}"
                                                        alt="{{ $berita->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $berita->img) }}"
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
                    <td>{{ $berita->desc ?? '-' }}</td>
                    <td class="manage-row">
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

</x-admin-table>
