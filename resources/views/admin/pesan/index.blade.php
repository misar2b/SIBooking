@extends('layouts.tamplateAdmin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pesan & Saran</h1>
    <p class="mb-4">Semua pesan saran dari user ORMAWA dan UKM UPI Purwakarta</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Data Pesan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTablePesan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengirim</th>
                            <th>Email</th>
                            <th>Perihal</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ Str::limit($item->message, 50) }}</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="d-flex">
                            
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id }}">
                                <i class="fas fa-eraser"></i>
                                </button>
                                </div>
                            </td>
                           </tr>
                            @empty
                             <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                             Belum ada pesan saran
                            </td>
                            </tr>
                             @endforelse
                        </tbody>
                        @foreach($pesans as $item)
                        @include('admin.pesan.confirmation-delete', ['item' => $item])
                        @endforeach
                </table>

            </div>
        </div>
    </div>

</div>
@endsection
