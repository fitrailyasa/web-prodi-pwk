<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Modul Kuliah
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.modul.create')
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
