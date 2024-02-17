<?php

namespace App\Http\Controllers;

use App\Models\bidangStudi;
use Illuminate\Http\Request;

class BidangStudiController extends Controller
{
    //
    public function index()
    {
        $bidstud = bidangStudi::all();
        return view('bidangstudi.index', [
            'bidangstudi' => $bidstud
        ]);
    }
    public function create()
    {
        return view('bidangstudi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bidangstudi' => 'required'
        ]);
        $array = $request->only([
            'bidangstudi'
        ]);
        $bidstud = bidangStudi::create($array);
        return redirect()->route('bidangstudi.index')
            ->with('success_message', 'Berhasil menambah Bidang Studi baru');
    }

    public function destroy($id)
    {
        $bidstud = bidangStudi::where('id', $id)->delete();
        return redirect()->route('bidangstudi.index')
            ->with('success_message', 'Berhasil menghapus Bidang Studi');
    }

    public function edit($id)
    {
        $bidstud = bidangStudi::find($id);
        if (!$bidstud)
            return redirect()->route('bidangstudi.index')->with('error_message', 'Bidang Studi dengan id' . $id . 'tidak ditemukan');
        return view('bidangstudi.edit', [
            'bidangstudi' => $bidstud
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data Bidang Studi
        $request->validate([
            'bidangstudi' => 'required',
        ]);
        $bidstud = bidangStudi::find($id);
        $bidstud->bidangStudi = $request->bidangstudi;
        $bidstud->save();
        return redirect()->route('bidangstudi.index')
            ->with('success_message', 'Berhasil mengubah bidang studi');
    }
}