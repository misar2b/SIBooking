@extends('layouts.tamplateAdmin')
@section ('content')
      <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Tempat UPI Purwakarta</h1>
                    <p class="mb-4">Data tempat yang sering dipinjam oleh mahasiswa ORMAWA dan UKM </p>
                    <a href="/admin/tempat/create" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-3"
                        class="fas fa-plus fa-sm">Tambah data</a>   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Data Tempat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tempat</th>
                                            <th>Lokasi</th>
                                            <th>Kapasitas</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        @foreach ($tempats as $item)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_tempat }}</td>
                                            <td>{{ $item->lokasi }}</td>
                                            <td>{{ $item->kapasitas }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td> <img src="{{ asset('img/tempat/' . $item->gambar) }}" width="100" ></td>
                                            <td>
                                                <div class="d-flex"> 
                                                    <a href="{{ route('admin.tempat.edit', $item->id) }}" class="d-inline-block mr-1 btn btn-sm btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id }}">
                                                        <i class="fas fa-eraser"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.tempat.confirmation-delete')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection