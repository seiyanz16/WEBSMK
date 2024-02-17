@extends('adminlte::page')
@section('title', 'List Bidang Studi')
@section('content_header')
<h1 class="m-0 text-dark">List Bidang Studi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('bidangstudi.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>    
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bidang Studi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bidangstudi as $key => $bid)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$bid->bidangstudi}}</td>
                            <td>
                                <a href="{{route('bidangstudi.edit',
$bid)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('bidangstudi.destroy',
$bid)}}" onclick="notificationBeforeDelete(event, this)" class="btn
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