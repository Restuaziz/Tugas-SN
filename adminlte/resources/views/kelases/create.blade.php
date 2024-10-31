@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Siswa</h1>
@stop

@section('content')
<form action="{{route('kelases.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputIDKelas">ID Kelas</label>
                        <input type="text" class="form-control @error('id_kelas') is-invalid @enderror" id="exampleInputIDKelas" placeholder="Masukkan id kelas" name="id_kelas">
                        @error('id_kelas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamaKelas">Nama Kelas</label>
                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="exampleInputNamaKelas" placeholder="Masukkan Nama Kelas" name="nama_kelas" value="{{ old('nama_kelas') }}">
                        @error('nama_kelas') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- <div class="form-group">
                            <label for="exampleInputPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                        </div> -->

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kelases.index')}}" class="btn btn-default">
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