<div class="modal fade" id="confirmationDelete{{ $item->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST">
      @csrf
      @method('DELETE')

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <p>Yakin ingin menghapus user <strong>{{ $item->name }}</strong>?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>
