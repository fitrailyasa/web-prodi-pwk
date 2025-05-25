<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Media Partner
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.medpart.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.medpart.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.medpart.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.medpart.deleteAll') --}}
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
                <th>{{ __('Logo') }}</th>
                <th>{{ __('Tautan') }}</th>
                <th>{{ __('Oleh') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medparts as $medpart)
                <tr @if ($medpart) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $medpart->name ?? '-' }}</td>
                    <td>
                        @if ($medpart->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $medpart->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $medpart->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $medpart->img) }}"
                                    alt="{{ $medpart->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $medpart->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $medpart->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $medpart->img) }}"
                                                        alt="{{ $medpart->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $medpart->img) }}"
                                                        download="{{ $medpart->img }}"
                                                        class="btn btn-success mt-2 col-12">Download
                                                        Logo</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td><a href="{{ $medpart->link }}" target="_blank">{{ $medpart->link ?? '-' }}</a></td>
                    <td>{{ $medpart->user->name ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.medpart.edit')
                            @include('admin.medpart.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $medparts->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
