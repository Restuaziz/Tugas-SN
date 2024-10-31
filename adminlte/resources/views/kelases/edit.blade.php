@extends('adminlte::page')

@section('title', 'Edit Kelas')

@section('content_header')
<h1 class="m-0 text-dark">Edit Kelas</h1>
@stop

@section('content')
<form action="{{route('kelases.update', $kelas)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="exampleInputIDKelas">ID Kelas</label>
                        <input type="text" class="form-control @error('id_kelas') is-invalid @enderror" id="exampleInputIDKelas" placeholder="Jurusan" name="id_kelas" value="{{$kelas->id_kelas ?? old('id_kelas')}}">
                        @error('id_kelas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamaKelas">Nama Kelas</label>
                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="exampleInputNamaKelas" placeholder="Nama lengkap" name="nama_kelas" value="{{$kelas->nama_kelas ?? old('nama_kelas')}}">
                        @error('nama_kelas') <span class="text-danger">{{$message}}</span> @enderror
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