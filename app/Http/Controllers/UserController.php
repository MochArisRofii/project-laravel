<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Menampilkan formulir untuk membuat pengguna baru
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan pengguna baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Menampilkan detail pengguna
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Menampilkan formulir untuk mengedit pengguna
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Memperbarui informasi pengguna
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}