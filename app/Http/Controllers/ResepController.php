<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reseps = Resep::all();
        return view('reseps.index', compact('reseps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reseps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'nullable'
        ]);

        Resep::create([
            'name' => $request->input('name'),
            'deskripsi' => $request->input('deskripsi'),
            'user_id' => auth()->id(), // Jika Anda menggunakan otentikasi pengguna
        ]);


        return redirect()->route('reseps.index')->with('success', 'Resep Sudah Di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resep = Resep::findOrFail($id);
        $bahans = $resep->bahans; // Mengambil semua bahan terkait dengan resep
        return view('reseps.show', compact('resep', 'bahans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resep $resep)
    {
        return view('reseps.edit', compact('resep'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $resep->update($request->all());

        return redirect()->route('reseps.index')->with('success', 'Resep Sudah di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resep $resep)
    {
        $resep->delete();
        return redirect()->route('reseps.index')->with('success', 'Resep Telah Terhapus');
    }
}
