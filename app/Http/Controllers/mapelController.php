<?php

namespace App\Http\Controllers;

use App\Models\kompKeahlian;
use App\Models\mapel;
use Illuminate\Http\Request;

class mapelController extends Controller
{
    //

    public function index()
    {
        $mapel = mapel::all();
        return view('mapel.index', [
            'mapel' => $mapel
        ]);
    }

    public function create()
    {
        return view('mapel.create', [
            'kompkeahlian' => kompKeahlian::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required|unique:mapel,mapel',
            'kdkompkeahlian' => 'required',
        ]);
        $array = $request->only([
            'mapel',
            'kdkompkeahlian'
        ]);
        mapel::create($array);
        return redirect()->route('mapel.index')
            ->with('success_message', 'Berhasil menambah Mata Pelajaran baru');
    }

    public function destroy($id)
    {
        $mapel = mapel::where('id', $id)->delete();
        return redirect()->route('mapel.index')
            ->with('success_message', 'Berhasil menghapus Mata Pelajaran');
    }

    public function edit($id)
    {
        $mapel = mapel::find($id);
        if (!$mapel)
            return redirect()->route('mapel.index')->with('error_message', 'Mata Pelajaran id' . $id . 'tidak ditemukan');
        return view('mapel.edit', [
            'mapel' => $mapel,
            'kdkompkeahlian' => kompKeahlian::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mapel' => 'required',
            'kdkompkeahlian' => 'required',
        ]);
        $mapel = mapel::find($id);
        $mapel->mapel = $request->mapel;
        $mapel->kdkompkeahlian = $request->kdkompkeahlian;
        $mapel->save();
        return redirect()->route('mapel.index')
            ->with('success_message', 'Berhasil mengubah Mata Pelajaran');
    }
}