@extends('layouts.tamplateAdmin')
@section ('content')
      <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ubah Data Tempat</h1>
                    <p class="mb-4">Ubah Data tempat yang boleh dipinjam oleh mahasiswa ORMAWA dan UKM</p>
            <!-- @if ($errors->any())
            <div class="alert alert-danger">
                  @add ($errors->all())
            </div>
            @endif -->
            <div class="row">
            <div class="col">
                  <form action="{{ route('admin.tempat.update', $tempat->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-3">
                        <label for="nama_tempat">Nama Tempat</label>
                        <input type="text" class="form-control" id="nama_tempat" name="nama_tempat" placeholder="Masukkan Nama Tempat"
                         value="{{ old('nama_tempat', $tempat->nama_tempat) }}">
                  </div>
                  <div class="form-group mb-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi"
                         value="{{ old('lokasi', $tempat->lokasi) }}">
                  </div>
                  <div class="form-group mb-3">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan Kapasitas"
                         value="{{ old('kapasitas', $tempat->kapasitas) }}">
                  </div>      
                  <div class="form-group mb-3">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                              <option value="ruangan">Ruangan {{ $tempat->kategori == 'ruangan' ? 'selected' : '' }}</option>
                              <option value="aula">Aula {{ $tempat->kategori == 'aula' ? 'selected' : '' }}</option>
                        </select>
                  </div>   
                  <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                              <option value="tersedia">Tersedia {{ $tempat->status == 'tersedia' ? 'selected' : '' }}</option>
                              <option value="dipakai">Tidak Tersedia {{ $tempat->status == 'tidak tersedia' ? 'selected' : '' }}</option>
                        </select> 
                  </div>  
                  <!-- <div class="form-group mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Masukkan Gambar">
                  </div> -->
                   <a href="{{ route('admin.tempat.index') }}" class="btn btn-secondary">Kembali</a>
                  <button type="submit" class="btn btn-danger">Submit</button>
                  </form>
            </div>
      </div>
      </div>
@endsection