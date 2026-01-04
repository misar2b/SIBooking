@extends('layouts.tamplateAdmin')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-4">Semua user ORMAWA dan UKM UPI Purwakarta</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableUser" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terdaftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><span class="badge badge-primary">user</span></td>
                            <td>
                                @if($item->created_at)
                                    {{ $item->created_at->format('d/m/Y H:i') }}
                                @else
                                    Baru daftar
                                @endif
                            </td>
                            <td>  
                                <button type="button" class="btn btn-sm btn-danger" 
                                        data-toggle="modal"
                                        data-target="#confirmationDelete{{ $item->id }}">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada user</td></tr>
                        @endforelse
                    </tbody>
                  @foreach($users as $item)
                    @include('admin.users.confirmation-delete', ['item' => $item])
                @endforeach
                </table>
            </div>
        </div>
    </div>  
</div>
@endsection
