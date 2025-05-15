<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Publikasi
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('dosen.publikasi.create')
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
                <th>{{ __('Judul') }}</th>
                <th>{{ __('Tipe') }}</th>
                <th>{{ __('Tahun') }}</th>
                <th>{{ __('Penerbit') }}</th>
                <th>{{ __('Link') }}</th>
                <th>{{ __('Deskripsi') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publikasis as $publikasi)
                <tr @if ($publikasi) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $publikasi->title ?? '-' }}</td>
                    <td>{{ $publikasi->type ?? '-' }}</td>
                    <td>{{ $publikasi->year ?? '-' }}</td>
                    <td>{{ $publikasi->publisher ?? '-' }}</td>
                    <td><a href="{{ $publikasi->link }}" target="_blank">{{ $publikasi->link ?? '-' }}</a></td>
                    <td>{{ $publikasi->description ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'dosen')
                            <!-- Edit and Delete Buttons -->
                            @include('dosen.publikasi.edit')
                            @include('dosen.publikasi.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $publikasis->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
