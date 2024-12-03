<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-danger" data-bs-toggle="modal"
    data-bs-target=".formDelete{{ $alumni->id }}"><i class="fas fa-trash"></i><span class="d-none d-sm-inline">
        {{ __('Hapus') }}</span></button>

<!-- Modal -->
<div class="modal fade formDelete{{ $alumni->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Hapus Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">Apakah anda yakin ingin menghapus data?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.alumni.destroy', $alumni->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                    <input type="submit" class="btn btn-danger light" name="" id="" value="Hapus">
                </form>
            </div>
        </div>
    </div>
</div>
