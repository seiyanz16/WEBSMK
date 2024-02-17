@extends('adminlte::page')
@section('title', 'Kompetensi Keahlian')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Kompetensi Keahlian</h1>
@stop
@section('content')
<form action="{{route('kompkeahlian.update', $komptensikeahlian)}}" method="post">
    @method('PUT')
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputkompkeahlian">Kompetensi Keahlian</label>
            <input type="text" class="form-control
@error('komptensikeahlian') is-invalid @enderror" id="exampleInputkompkeahlian" placeholder="Kompetensi Keahlian"
              name="komptensikeahlian" value="{{$komptensikeahlian->komptensikeahlian ?? old('komptensikeahlian')}}">
            @error('komptensikeahlian') <span class="textdanger">{{$message}}</span> @enderror
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="hidden" name="kdstandkomp" id="kdstandkomp" value="{{$komptensikeahlian-> fstandkomp -> id ?? old('kdstandkomp')}}">
              <input type="text" class="form-control
@error('standkomp') is-invalid @enderror" placeholder="Standar Kompetensi" id="standkomp" name="standkomp"
                value="{{$komptensikeahlian -> fstandkomp -> standarkompetensi ?? old('standkomp')}}" arialabel="Standar Kompetensi" aria-describedby="cari" readonly>
              <button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning" type="button"
                id="button-addon2">Cari Data Standar Kompetensi</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari Standar Kompetensi</h5>
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
                          <th>Standar Kompetensi</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($kdstandkomp as $key => $sk)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td id={{$key+1}}>{{$sk->standarkompetensi}}</td>
                          <td>
                            <button type="button" class="btn btn-primary
btn-xs" onclick="pilih('{{$sk->id}}', '{{$sk->standarkompetensi}}')" data-dismiss="modal">
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
          @error('kdstandkomp') <span class="textdanger">{{$message}}</span> @enderror
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{route('kompkeahlian.index')}}" class="btn btn-default">
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
    function pilih(id, skomp) {
      document.getElementById('kdstandkomp').value = id
      document.getElementById('standkomp').value = skomp
    }
  </script>
  @endpush