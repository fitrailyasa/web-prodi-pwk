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
