<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Tautan Akademik dan Lainnya
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.link.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.link.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.link.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.link.deleteAll') --}}
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
                <th>{{ __('Tautan') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr @if ($link) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $link->name ?? '-' }}</td>
                    <td>
                        @if ($link->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $link->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $link->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $link->img) }}"
                                    alt="{{ $link->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $link->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $link->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('assets/img/' . $link->img) }}"
                                                        alt="{{ $link->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $link->img) }}"
                                                        download="{{ $link->img }}"
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
                    <td>{{ $link->desc ?? '-' }}</td>
                    <td><a href="{{ $link->link }}" target="_blank">{{ $link->link ?? '-' }}</a></td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.link.edit')
                            @include('admin.link.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $links->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
