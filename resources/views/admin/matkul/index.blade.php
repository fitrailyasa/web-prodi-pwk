<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Mata Kuliah
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
        @include('admin.matkul.deleteAll')
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
                <th>{{ __('Nama Matkul') }}</th>
                <th>{{ __('Kode Matkul') }}</th>
                <th>{{ __('Jumlah SKS') }}</th>
                <th>{{ __('Semester') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matkuls as $matkul)
                <tr @if ($matkul) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $matkul->name }}</td>
                    <td>{{ $matkul->code }}</td>
                    <td>{{ $matkul->credits }}</td>
                    <td>{{ $matkul->semester }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'dosen')
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
