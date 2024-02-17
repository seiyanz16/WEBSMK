@extends('adminlte::page')
@section('title', 'Mata Pelajaran')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Mata Pelajaran</h1>
@stop
@section('content')
<form action="{{route('mapel.update', $mapel)}}" method="post">
    @method('PUT')
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputmapel">Mata Pelajaran</label>
            <input type="text" class="form-control
@error('mapel') is-invalid @enderror" id="exampleInputmapel" placeholder="Mata Pelajaran"
              name="mapel" value="{{$mapel->mapel ?? old('mapel')}}">
            @error('mapel') <span class="textdanger">{{$message}}</span> @enderror
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="hidden" name="kdkompkeahlian" id="kdkompkeahlian" value="{{$mapel-> fkompkeahlian -> id ?? old('kdkompkeahlian')}}">
              <input type="text" class="form-control
@error('kompkeahlian') is-invalid @enderror" placeholder="Kompetensi Keahlian" id="kompkeahlian" name="kompkeahlian"
                value="{{$mapel -> fkompkeahlian -> komptensikeahlian ?? old('kompkeahlian')}}" arialabel="Standar Kompetensi" aria-describedby="cari" readonly>
              <button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning" type="button"
                id="button-addon2">Cari Data Kompetensi Keahlian</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari Kompetensi Keahlian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-hover table-bordered
table-stripped" id="example2">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kompetensi Keahlian</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($kdkompkeahlian as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->kdkompkeahlian}}</td>
                            <td>
                          <td>
                            <button type="button" class="btn btn-primary
btn-xs" onclick="pilih('{{$data->id}}', '{{$data->kdkompkeahlian}}')" data-dismiss="modal">
                              Pilih
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @error('kdkompkeahlian') <span class="textdanger">{{$message}}</span> @enderror
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{route('mapel.index')}}" class="btn btn-default">
            Batal
          </a>
        </div>

      </div>
    </div>
  </div>
  @stop
  @push('js')
  <script>
    $('#example2').DataTable({
      "responsive": true,
    });
    function pilih(id, komp) {
      document.getElementById('kdkompkeahlian').value = id
      document.getElementById('kompkeahlian').value = komp
    }
  </script>
  @endpush