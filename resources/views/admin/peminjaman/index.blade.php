@extends('layouts.tamplateAdmin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman Tempat</h1>
    <p class="mb-4">Semua pengajuan peminjaman tempat dari user ORMAWA dan UKM UPI Purwakarta</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Data Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTablePeminjaman" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>No. HP</th>
                            <th>Kegiatan</th>
                            <th>Diajukan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamen as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->tempat->nama_tempat }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                            <td>
                                <a href="https://wa.me/62{{ $item->no_hp }}" 
                                   class="btn btn-success btn-sm" target="_blank">
                                    <i class="fab fa-whatsapp"></i> {{ $item->no_hp }}
                                </a>
                            </td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                            <button class="btn btn-warning btn-sm action-done">
                                <i class="fas fa-eye"></i>
                            </button>
                            </td>
                        <script>
                        document.querySelectorAll('.action-done').forEach(btn => {
                            btn.addEventListener('click', function () {
                                const icon = this.querySelector('i');

                                // ganti icon
                                icon.classList.remove('fa-eye');
                                icon.classList.add('fa-check-circle');

                                // ganti warna
                                this.classList.remove('btn-warning');
                                this.classList.add('btn-success');

                                // disable tombol
                                this.disabled = true;
                            });
                        });
                        </script>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                Belum ada pengajuan peminjaman
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
