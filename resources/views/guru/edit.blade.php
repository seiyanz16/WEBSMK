@extends('adminlte::page')
@section('title', 'Edit Guru')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Guru</h1>
@stop
@section('content')
    <form action="{{ route('guru.update', $guru) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nip_nuptk">NIP/NUPTK</label>
                            <input type="text" class="form-control
@error('nip_nuptk') is-invalid @enderror"
                                id="nip_nuptk" placeholder="NIP/NUPTK" name="nip_nuptk"
                                value="{{ $guru->nip_nuptk ?? old('nip_nuptk') }}">
                            @error('nip_nuptk')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="namaguru">Nama</label>
                            <input type="text" class="form-control
@error('namaguru') is-invalid @enderror"
                                id="namaguru" placeholder="Nama
lengkap" name="namaguru"
                                value="{{ $guru->namaguru ?? old('namaguru') }}">
                            @error('namaguru')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="notelp">No Telepon</label>
                            <input type="number" class="form-control
@error('notelp') is-invalid @enderror" id="notelp"
                                placeholder="Masukkan
No Telepon/HP" name="notelp"
                                value="{{ $guru->notelp ?? old('notelp') }}">
                            @error('notelp')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="jkL" value="L"
                                    @if ($guru->jk == 'L' || old('jk') == 'L') checked @endif checked>
                                <label class="form-check-label me-5" for="jkL">
                                    Laki-laki
                                </label>
                                <input class="form-check-input" type="radio" name="jk" id="jkP" value="P"
                                    @if ($guru->jk == 'P' || old('jk') == 'P') checked @endif>
                                <label class="form-check-label" for="jkP">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea rows="5" class="form-control
@error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ $guru->alamat ?? old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-select @error('agama') isinvalid @enderror" id="agama" name="agama">
                                <option value="I" @if ($guru->agama == 'I' || old('agama') == 'I') selected @endif>Islam</option>
                                <option value="H" @if ($guru->agama == 'H' || old('agama') == 'H') selected @endif>Hindu</option>
                                <option value="B" @if ($guru->agama == 'B' || old('agama') == 'B') selected @endif>Budha</option>
                                <option value="K" @if ($guru->agama == 'K' || old('agama') == 'K') selected @endif>Katolik</option>
                                <option value="P" @if ($guru->agama == 'P' || old('agama') == 'P') selected @endif>Protestan</option>
                                <option value="L" @if ($guru->agama == 'L' || old('agama') == 'L') selected @endif>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gelardepan">Gelar Depan</label>
                            <input type="text" class="form-control
@error('gelardepan') is-invalid @enderror"
                                id="gelardepan" placeholder="Gelar Depan" name="gelardepan"
                                value="{{ $guru->gelardepan ?? old('gelardepan') }}">
                            @error('gelardepan')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gelarbelakang">Gelar
                                Belakang</label>
                            <input type="text" class="form-control
@error('gelarbelakang') is-invalid @enderror"
                                id="gelarbelakang" placeholder="Gelar Belakang" name="gelarbelakang"
                                value="{{ $guru->gelarbelakang ?? old('gelarbelakang') }}">
                            @error('gelarbelakang')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="namapt">Perguruan Tinggi</label>
                            <input type="text" class="form-control
@error('namapt') is-invalid @enderror" id="namapt"
                                placeholder="Nama
Perguruan Tinggi" name="namapt"
                                value="{{ $guru->namapt ?? old('namapt') }}">
                            @error('namapt')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahunlulus">Tahun Lulus</label>
                            <select class="form-select @error('tahunlulus')
is-invalid @enderror" id="tahunlulus"
                                name="tahunlulus">
                                @for ($thn = date('Y'); $thn > date('Y') - 50; $thn--)
                                    <option value="{{ $thn }}"
                                        @if ($guru->tahunlulus == $thn || old('tahunlulus') == $thn) selected @endif>{{ $thn }}</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <label for="tempatlahir">Tempat Lahir</label>
                            <input type="text" class="form-control
@error('tempatlahir') is-invalid @enderror"
                                id="tempatlahir" placeholder="Tempat Lahir" name="tempatlahir"
                                value="{{ $guru->tempatlahir ?? old('tempatlahir') }}">
                            @error('tempatlahir')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" class="form-control"
                                class="form-control @error('tgllahir') is-invalid @enderror" id="tgllahir"
                                placeholder="Tanggal Lahir" name="tgllahir"
                                value="{{ $guru->tgllahir ?? old('tgllahir') }}">
                            @error('tgllahir')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto" class="formlabel">Foto</label>
                            <img src="/storage/{{ $guru->foto }}" class="imgthumbnail d-block" name="tampil"
                                alt="..." width="15%" id="tampil">
                            <input class="form-control @error('foto') isinvalid @enderror" type="file" id="foto"
                                name="foto">
                            @error('foto')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('guru.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @push('js')
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#tampil').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#foto").change(function() {
                readURL(this);
                //$('#hasil').show();
            });
        </script>
    @endpush
