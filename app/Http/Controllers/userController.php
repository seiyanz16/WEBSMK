<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        return view('users.index', [
            'users' => $user
        ]);
    }

    public function create()
    {
        //Menampilkan Form Tambah User
        return view('users.create');
    }
    public function store(Request $request)
    {
        //Menyimpan Data User Baru
        $request->validate([
            'nis' => 'required|unique:users,nis',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'level' => 'required'
        ]);
        $array = $request->only([
            'nis',
            'name',
            'email',
            'password',
            'level',
            'aktif'
        ]);
        $array['password'] = bcrypt($array['password']);
        $user = User::create($array);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user)
            return redirect()->route('users.index')->with('error_message', 'User dengan id' . $id . 'tidak ditemukan');
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data User
        $request->validate([
            'nis' => 'required|unique:users,nis,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|confirmed',
            'level' => 'required',
            'aktif' => 'required'
        ]);
        $user = User::find($id);
        $user->nis = $request->nis;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->aktif = $request->aktif;
        $user->save();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil mengubah user');
    }
}