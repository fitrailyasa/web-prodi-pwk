<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Medpart
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
                <th>{{ __('Name') }}</th>
                <th>{{ __('Img') }}</th>
                <th>{{ __('Desc') }}</th>
                <th>{{ __('Action') }}</th>
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
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $medpart->img) }}"
                                    alt="{{ $medpart->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $medpart->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
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
                                                        src="{{ asset('assets/img/' . $medpart->img) }}"
                                                        alt="{{ $medpart->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $medpart->img) }}"
                                                        download="{{ $medpart->img }}"
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
                    <td>{{ $medpart->desc ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.medpart.edit')
                            @include('admin.medpart.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Img') }}</th>
                <th>{{ __('Desc') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            <tr>
                <th colspan="5">
                    {{ $medparts->appends(['perPage' => $perPage, 'search' => $search])->links() }}
                </th>
            </tr>
        </tfoot>
    </table>

</x-admin-table>
