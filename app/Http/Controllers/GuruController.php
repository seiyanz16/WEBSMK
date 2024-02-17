<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;


class GuruController extends Controller
{
    //
    public function index()
    {
        //Menampilkan Data Guru
        return view('guru.index', ['guru' => Guru::all()]);
    }

    public function create()
    {
        //Menampilkan Form Tambah Guru
        return view('guru.create');
    }
    public function store(Request $request)
    {
        //Menyimpan Data Guru
        $request->validate([
            'nip_nuptk' => 'required|unique:guru,nip_nuptk',
            'namaguru' => 'required',
            'notelp' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'namapt' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'foto' => 'required|image|file|max:2048'
        ]);
        $array = $request->only([
            'nip_nuptk',
            'namaguru',
            'notelp',
            'jk',
            'alamat',
            'agama',
            'gelardepan',
            'gelarbelakang',
            'namapt',
            'tahunlulus',
            'tempatlahir',
            'tgllahir'
        ]);

        $array['foto'] = $request->file('foto')->store('Foto Guru');
        $tambah = Guru::create($array);
        if ($tambah)
            $request->file('foto')->store('Foto Guru');
        return redirect()->route('guru.index')
            ->with('success_message', 'Berhasil menambah guru baru');
    }

    public function destroy(Request $request, $id)
    {
        //Menghapus Guru
        $guru = Guru::find($id);
        if ($guru) {
            $hapus = $guru->delete();
            if ($hapus)
                unlink("storage/" . $guru->foto);
        }
        return redirect()->route('guru.index')
            ->with('success_message', 'Berhasil menghapus guru "' .
                $guru->name . '" !');
    }

    public function edit($id)
    {
        //Menampilkan Form Edit Guru
        $guru = Guru::find($id);
        if (!$guru)
            return redirect()->route('guru.index')->with('error_message', 'Guru dengan id = ' . $id . ' tidak ditemukan');
        return view('guru.edit', [
            'guru' => $guru
        ]);
    }
    public function update(Request $request, $id)
    {
        //Mengedit Data Guru
        $request->validate([
            'nip_nuptk' => 'required|unique:guru,nip_nuptk,' . $id,
            'namaguru' => 'required',
            'notelp' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'namapt' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'foto' => $request->file('foto') != null ?
            'image|file|max:2048' : ''
        ]);
        $guru = Guru::find($id);
        $guru->nip_nuptk = $request->nip_nuptk;
        $guru->namaguru = $request->namaguru;
        $guru->notelp = $request->notelp;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->agama = $request->agama;
        $guru->gelardepan = $request->gelardepan;
        $guru->gelarbelakang = $request->gelarbelakang;
        $guru->namapt = $request->namapt;
        $guru->tahunlulus = $request->tahunlulus;
        $guru->tempatlahir = $request->tempatlahir;
        $guru->tgllahir = $request->tgllahir;
        if ($request->file('foto') != null) {
            unlink("storage/" . $guru->foto);
            $guru->foto = $request->file('foto')->store('Foto Guru');
        }
        $guru->save();
        return redirect()->route('guru.index')
            ->with('success_message', 'Berhasil mengubah guru');
    }

}