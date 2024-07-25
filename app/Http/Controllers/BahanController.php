<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Resep;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahans = Bahan::all();
        return view('bahans.index', compact('bahans'));
    }

    public function create($resep_id)
    {
        $resep = Resep::findOrFail($resep_id);
        return view('bahans.create', compact('resep'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'require d|string',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'resep_id' => 'required|exists:reseps,id',
        ]);

        Bahan::create($request->all());

        return redirect()->route('reseps.show', $request->resep_id)->with('success', 'Bahan created successfully.');
    }

    public function show(Bahan $bahan)
    {
        return view('bahans.show', compact('bahan'));
    }

    public function edit(Bahan $bahan)
    {
        $reseps = Resep::all(); // Ambil semua resep untuk dipilih
        return view('bahans.edit', compact('bahan', 'reseps'));
    }

    public function update(Request $request, Bahan $bahan)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            'resep_id' => 'required|exists:reseps,id', // Validasi bahwa resep_id harus ada di tabel reseps
        ]);

        $bahan->update($request->all());

        return redirect()->route('reseps.show', $bahan->resep_id)->with('success', 'Bahan updated successfully.');
    }

    public function destroy(Bahan $bahan)
    {
        $resepId = $bahan->resep_id; // Ambil ID resep yang terkait dengan bahan
        $bahan->delete();

        return redirect()->route('reseps.show', $resepId)->with('success', 'Bahan deleted successfully.');
    }
}
