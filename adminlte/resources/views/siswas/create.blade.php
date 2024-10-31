@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Siswa</h1>
@stop

@section('content')
<form action="{{route('siswas.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Siswa</label>
                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="exampleInputName" placeholder="Nama Siswa" name="nama_siswa" value="{{old('nama_siswa')}}">
                        @error('nama_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNIS">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputNIS" placeholder="Masukkan NIS" name="nis" value="{{old('nis')}}">
                        @error('nis') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJK">Jenis Kelamin</label>
                        <div style="margin-left: 20px;">
                            <input type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin_l" name="jenis_kelamin" value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_kelamin_l">Laki-Laki</label>
                        </div>
                        <div style="margin-left: 20px;">
                            <input type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin_p" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTglLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="exampleInputTglLahir" placeholder="Tanggal Lahir" name="tanggal_lahir">
                        @error('tanggal_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputIDKelas">ID Kelas</label>
                        <input type="text" class="form-control @error('id_kelas') is-invalid @enderror" id="exampleInputIDKelas" placeholder="Masukkan id kelas" name="id_kelas">
                        @error('id_kelas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <!-- <div class="form-group">
                            <label for="exampleInputPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                        </div> -->

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

    @push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/public/css/style.css"> --}}

    @endpush