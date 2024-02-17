@extends('adminlte::page')
@section('title', 'Tambah Bidang Studi')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Bidang Studi</h1>
@stop
@section('content')
<form action="{{route('bidangstudi.store')}}" method="post">
       @csrf
       <div class="row">
              <div class="col-12">
                     <div class="card">
                            <div class="card-body">
                                   <div class="form-group">
                                          <label for="exampleInputbidangstudi">Bidang Studi</label>
                                          <input type="text"
                                                 class="form-control @error('bidangstudi') is-invalid @enderror"
                                                 id="exampleInputNIS" placeholder="Bidang Studi" name="bidangstudi"
                                                 value="{{old('bidangstudi')}}">
                                          @error('bidangstudi') <span class="textdanger">{{$message}}</span> @enderror
                                   </div>

                            </div>
                            <div class="card-footer">
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                                   <a href="{{route('bidangstudi.index')}}" class="btn btn-default">
                                          Batal
                                   </a>
                            </div>
                     </div>
              </div>
       </div>
       @stop