<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        User
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.user.create')
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
                <th>{{ __('Email') }}</th>
                <th>{{ __('Peran') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td>{{ $user->email ?? '-' }}</td>
                    <td>
                        @if ($user->role == 'admin')
                            <span class="badge badge-primary">{{ $user->role }}</span>
                        @elseif ($user->role != 'admin')
                            <span class="badge badge-secondary">{{ $user->role }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($user->status == 'aktif')
                            <span class="badge badge-success">{{ $user->status }}</span>
                        @elseif ($user->status != 'aktif')
                            <span class="badge badge-secondary">{{ $user->status }}</span>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.user.edit')
                            @include('admin.user.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
