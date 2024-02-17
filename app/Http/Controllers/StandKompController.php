<?php

namespace App\Http\Controllers;

use App\Models\bidangStudi;
use App\Models\StandKomp;
use Illuminate\Http\Request;

class StandKompController extends Controller
{
    //
    public function index()
    {
        $skomp = StandKomp::all();
        return view('standkomp.index', [
            'standkomp' => $skomp
        ]);
    }

    public function create()
    {
        return view('standkomp.create', [
            'bidangstudi' => bidangStudi::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'standarkompetensi' => 'required|unique:standarkompetensi,standarkompetensi',
            'kdbidstudi' => 'required',
        ]);
        $array = $request->only([
            'standarkompetensi',
            'kdbidstudi'
        ]);
        StandKomp::create($array);
        return redirect()->route('standkomp.index')
            ->with('success_message', 'Berhasil menambah Standar Kompetensi baru');
    }


    public function destroy($id)
    {
        $skomp = StandKomp::where('id', $id)->delete();
        return redirect()->route('standkomp.index')
            ->with('success_message', 'Berhasil menghapus Standar Kompetensi');
    }

    public function edit($id)
    {
        //Menampilkan Form Edit
        $skomp = StandKomp::find($id);
        if (!$skomp)
            return redirect()->route('standkomp.index')
                ->with('error_message', 'Standar Kompetensi dengan id = ' . $id . 'tidak ditemukan');
        return view('standkomp.edit', [
            'standarkompetensi' => $skomp,
            'kdbidstudi' => BidangStudi::all() //Mengirimkan semua data bidang studi ke Modal pada halaman edit
        ]);
    }
    public function update(Request $request, $id)
    {
        //Mengedit Data Standar Kompetensi
        $request->validate([
            'standarkompetensi' =>
            'required|unique:standarkompetensi,standarkompetensi,' . $id
        ]);
        $skomp = StandKomp::find($id);
        $skomp->standarkompetensi = $request->standarkompetensi;
        $skomp->kdbidstudi = $request->kdbidstudi;
        $skomp->save();
        return redirect()->route('standkomp.index')
            ->with('success_message', 'Berhasil mengubah Standar
Kompetensi');
    }
}