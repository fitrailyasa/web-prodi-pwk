<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Alumni
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.alumni.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.alumni.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.alumni.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.alumni.deleteAll') --}}
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
                <th>{{ __('Pekerjaan') }}</th>
                <th>{{ __('Perusahaan') }}</th>
                <th>{{ __('Tahun Masuk') }}</th>
                <th>{{ __('Tahun Lulus') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnis as $alumni)
                <tr @if ($alumni) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $alumni->name ?? '-' }}</td>
                    <td>{{ $alumni->work ?? '-' }}</td>
                    <td>{{ $alumni->company ?? '-' }}</td>
                    <td>{{ $alumni->class_year ?? '-' }}</td>
                    <td>{{ $alumni->graduation_year ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.alumni.edit')
                            @include('admin.alumni.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $alumnis->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
