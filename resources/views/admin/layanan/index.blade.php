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
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Nama Layanan') }}</th>
                <th>{{ __('Tipe') }}</th>
                <th>{{ __('Dokumen') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($layanans as $layanan)
                <tr>
                    <td>{{ $loop->iteration + ($layanans->currentPage() - 1) * $layanans->perPage() }}</td>
                    <td><strong>{{ $layanan->name ?? '-' }}</strong></td>
                    <td class="text-capitalize">{{ $layanan->linkType ?? '-' }}</td>
                    <td>
                        @if ($layanan->linkType === 'file' && $layanan->file)
                            <a href="{{ asset('storage/' . $layanan->file) }}" target="_blank" class="btn btn-sm btn-info">
                                <i class="fas fa-file-alt"></i> Lihat File
                            </a>
                        @elseif ($layanan->linkType === 'url' && $layanan->link)
                            <a href="{{ $layanan->link }}" target="_blank" class="btn btn-sm btn-success">
                                <i class="fas fa-link"></i> Kunjungi Link
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if (auth()->user()->role === 'admin')
                            @include('admin.layanan.edit')
                            @include('admin.layanan.delete')
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada data layanan tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-end">
        {{ $layanans->appends(['perPage' => $perPage, 'search' => $search])->links() }}
    </div>
</x-admin-table>
