@extends('layouts.tamplateAdmin')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Peminjaman #{{ $peminjaman->id }}</h1>
        <a href="{{ route('admin.peminjaman.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <!-- Detail Card -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Peminjaman</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Peminjam:</strong> {{ $peminjaman->user->name ?? 'N/A' }}<br>
                            <strong>Email:</strong> {{ $peminjaman->user->email ?? 'N/A' }}<br>
                            <strong>No HP:</strong> {{ $peminjaman->no_hp }}
                        </div>
                        <div class="col-md-6">
                            <strong>Tempat:</strong> {{ $peminjaman->tempat->nama ?? 'N/A' }}<br>
                            <strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}<br>
                            <strong>Status:</strong>
                            @if($peminjaman->status == 'pending')
                                <span class="badge badge-warning">Menunggu</span>
                            @elseif($peminjaman->status == 'approved')
                                <span class="badge badge-success">Disetujui</span>
                            @else
                                <span class="badge badge-danger">Ditolak</span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <strong>Diajukan:</strong> {{ $peminjaman->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
        </div>

        <!-- Sidebar Aksi -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <a href="https://wa.me/{{ $peminjaman->no_hp }}?text=Detail%20Peminjaman%20#{{ $peminjaman->id }}" class="btn btn-success btn-block mb-2">
                        <i class="fab fa-whatsapp"></i> Chat WA
                    </a>
                    <a href="{{ route('admin.peminjaman.edit', $peminjaman) }}" class="btn btn-warning btn-block mb-2">
                        <i class="fas fa-edit"></i> Edit Status
                    </a>
                    {!! Form::open(['method' => 'DELETE','route' => ['admin.peminjaman.destroy', $peminjaman],'onclick' => 'return confirm("Yakin?")']) !!}
                    <button type="submit" class="btn btn-danger btn-block">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
