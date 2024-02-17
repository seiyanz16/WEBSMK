@extends('adminlte::page')
@section('title', 'List Mata Pelajaran')
@section('content_header')
<h1 class="m-0 text-dark">List Mata Pelajaran</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('mapel.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Mata Pelajaran</th>
                            <th>Standar Kompetensi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mapel as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->mapel}}</td>
                            <td id={{$key+1}}>{{$data->fkompkeahlian->komptensikeahlian}}</td>
                            <td>
                                <a href="{{route('mapel.edit',
$data)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('mapel.destroy',
$data)}}" onclick="notificationBeforeDelete(event, this)" class="btn
btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
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