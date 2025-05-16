<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Jadwal Kuliah
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.jadwal.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.jadwal.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.jadwal.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        @if (auth()->user()->role == 'admin')
            @include('admin.jadwal.deleteAll')
        @endif
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
                <th>{{ __('Mata Kuliah') }}</th>
                <th>{{ __('Kelas') }}</th>
                <th>{{ __('Ruangan') }}</th>
                <th>{{ __('Dosen') }}</th>
                <th>{{ __('Hari') }}</th>
                <th>{{ __('Waktu') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr @if ($jadwal) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $jadwal->matkul->name ?? '-' }}</td>
                    <td>{{ $jadwal->class ?? '-' }}</td>
                    <td>{{ $jadwal->room ?? '-' }}</td>
                    <td>{{ $jadwal->dosen->name ?? '-' }}</td>
                    <td>{{ $jadwal->day ?? '-' }}</td>
                    <td>{{ $jadwal->start_time ?? '-' }} - {{ $jadwal->end_time ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'dosen')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.jadwal.edit')
                            @include('admin.jadwal.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $jadwals->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
