<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Layanan Kuliah
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.layanan.create')
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
                <th>{{ __('File') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($layanans as $layanan)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>
                        <strong>{{ $layanan->name ?? '-' }}</strong>
                    </td>
                    <td>
                        @if ($layanan->file)
                            <a href="{{ asset('storage/' . $layanan->file) }}" target="_blank"
                                class="btn btn-sm btn-info">
                                <i class="fas fa-file"></i> Lihat File
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.layanan.edit')
                            @include('admin.layanan.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $layanans->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
