@extends('adminlte::page')

@section('title', 'Data Kelas Kosong')

@section('content_header')
<h1 class="m-0 text-dark">Data Kelas Kosong</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <table class="table table-hover table-bordered table-stripped" id="example2">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Jumlah Siswa</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
    @if($kelas->isEmpty())
        <tr>
            <td colspan="5" class="text-center">Tidak ada kelas yang ditemukan</td>
        </tr>
    @else
        @foreach($kelas as $key => $kel)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $kel->id_kelas }}</td>
                <td>{{ $kel->nama_kelas }}</td>
                <td>{{ $kel->jumlah_siswa }}</td>
                <td>
                    @if($kel->jumlah_siswa == 0)
                        Kelas belum memiliki siswa
                    @else
                        Kelas memiliki {{ $kel->jumlah_siswa }} siswa
                    @endif
                                            </td>
                                        </tr>
                                 @endforeach
                             @endif
                         </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush