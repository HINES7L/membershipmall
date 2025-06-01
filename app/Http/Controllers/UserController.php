<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
{
    // Cek user login dan pastikan id = 1
    if (auth()->check() && auth()->id() == 1) {
        $users = User::all();
        return view('users.index', compact('users'));
    } else {
        // Kalau bukan user id 1, abort dengan 403 Forbidden
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'points' => 0, // pastikan isi default 0 jika belum di-migration
]);



    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
}


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
