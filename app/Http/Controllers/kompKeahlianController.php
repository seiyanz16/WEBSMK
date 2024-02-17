<?php

namespace App\Http\Controllers;

use App\Models\kompKeahlian;
use App\Models\StandKomp;
use Illuminate\Http\Request;

class kompKeahlianController extends Controller
{
    //

    public function index()
    {
        $kompke = kompKeahlian::all();
        return view('kompkeahlian.index', [
            'kompkeahlian' => $kompke
        ]);
    }

    public function create()
    {
        return view('kompkeahlian.create', [
            'standkomp' => StandKomp::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'komptensikeahlian' => 'required|unique:komptensikeahlian,komptensikeahlian',
            'kdstandkomp' => 'required',
        ]);
        $array = $request->only([
            'komptensikeahlian',
            'kdstandkomp'
        ]);
        kompKeahlian::create($array);
        return redirect()->route('kompkeahlian.index')
            ->with('success_message', 'Berhasil menambah Kompetensi Keahlian baru');
    }   

    public function destroy($id)
    {
        $kompke = kompKeahlian::where('id', $id)->delete();
        return redirect()->route('kompkeahlian.index')
            ->with('success_message', 'Berhasil menghapus Standar Kompetensi');
    }

    public function edit($id)
    {
        $kompke = kompKeahlian::find($id);
        if (!$kompke)
            return redirect()->route('kompkeahlian.index')->with('error_message', 'Kompetensi Kehalian id' . $id . 'tidak ditemukan');
        return view('kompkeahlian.edit', [
            'komptensikeahlian' => $kompke,
            'kdstandkomp' => StandKomp::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'komptensikeahlian' => 'required',
            'kdstandkomp' => 'required',
        ]);
        $skomp = kompKeahlian::find($id);
        $skomp->komptensikeahlian = $request->komptensikeahlian;
        $skomp->kdstandkomp = $request->kdstandkomp;
        $skomp->save();
        return redirect()->route('kompkeahlian.index')
            ->with('success_message', 'Berhasil mengubah kompetensi keahlian');
    }
}
