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
                <th>{{ __('Nama') }}</th>
                <th>{{ __('Gambar') }}</th>
                <th>{{ __('Deskripsi') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tentangs as $tentang)
                <tr @if ($tentang) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $tentang->name ?? '-' }}</td>
                    <td>
                        @if ($tentang->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $tentang->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $tentang->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $tentang->img) }}"
                                    alt="{{ $tentang->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $tentang->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $tentang->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('assets/img/' . $tentang->img) }}"
                                                        alt="{{ $tentang->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $tentang->img) }}"
                                                        download="{{ $tentang->img }}"
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
                    <td>{{ $tentang->desc ?? '-' }}</td>
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

</x-admin-table>
