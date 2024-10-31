@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="container">
    <h1>Detail Siswa</h1>
    <div class="card">
        <div class="card-header">
            {{ $siswa->nama }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $siswa->name }}</h5>
            <p class="card-text">Email: {{ $siswa->email }}</p>
            <a href="{{ route('siswas.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
