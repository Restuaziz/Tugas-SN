@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Edit Siswa</h1>
@stop

@section('content')
<form action="{{route('siswas.update', $siswa)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputNamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="exampleInputNamaSiswa" placeholder="Nama lengkap" name="nama_siswa" value="{{$siswa->nama_siswa ?? old('nama_siswa')}}">
                        @error('nama_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputNIS">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputNIS" placeholder="Masukkan NIS" name="nis" value="{{$siswa->nis ?? old('nis')}}">
                        @error('nis') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleInputJenisKelamin" name="jenis_kelamin" value="{{$siswa->jenis_kelamin ?? old('jenis_kelamin')}}">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ (old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki') ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ (old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTglLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="exampleInputTglLahir" placeholder="tgl lahir" name="tanggal_lahir" value="{{$siswa->tanggal_lahir ?? old('tanggal_lahir')}}">
                        @error('tanggal_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputIDKelas">ID Kelas</label>
                        <input type="text" class="form-control @error('id_kelas') is-invalid @enderror" id="exampleInputIDKelas" placeholder="Jurusan" name="id_kelas" value="{{$siswa->id_kelas ?? old('id_kelas')}}">
                        @error('id_kelas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('siswas.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop