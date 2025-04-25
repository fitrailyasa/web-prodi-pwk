<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        MBKM
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.mbkm.create')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.mbkm.deleteAll') --}}
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
                <th>{{ __('Deskripsi') }}</th>
                <th>{{ __('Benefit') }}</th>
                <th>{{ __('Link') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mbkms as $mbkm)
                <tr @if ($mbkm) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $mbkm->title }}</td>
                    <td>{{ $mbkm->description }}</td>
                    <td>
                        @if (is_array($mbkm->benefits))
                            <ul class="list-disc list-inside">
                                @foreach ($mbkm->benefits as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        @else
                            {{ $mbkm->benefits }}
                        @endif
                    </td>
                    <td>{{ $mbkm->link }}</td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.mbkm.edit')
                            @include('admin.mbkm.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $mbkms->appends(['perPage' => $perPage, 'search' => $search])->links() }}
</x-admin-table>
