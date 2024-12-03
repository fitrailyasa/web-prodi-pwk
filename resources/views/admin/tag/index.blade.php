<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Tag
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.tag.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.tag.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.tag.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.tag.deleteAll') --}}
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
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr @if ($tag) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $tag->name ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.tag.edit')
                            @include('admin.tag.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tags->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
