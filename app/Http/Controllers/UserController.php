<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $users = User::orderBy('username')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $users = new User;
        $users->username = $request->input('username');
        $users->password = Hash::make($request->input('password')); // Hash the password
        $users->role = 'admin';

        $users->save();
        return redirect('/user')->with('success', 'Admin berhasil dibuat.');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|max:255', // Password bisa kosong jika tidak ingin diubah
        ]);

        $user = User::find($id);

        // Memperbarui username
        $user->username = $request->input('username');

        // Memeriksa apakah password baru disediakan, jika tidak, menggunakan password yang sudah ada
        if ($request->filled('password') || $request->filled('username')) {
            $user->password = Hash::make($request->input('password')); // Hash the new password
        }

        $user->save();

        return redirect('/user')->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect('/user')->with('success', 'Admin berhasil dihapus.');
    }

}
