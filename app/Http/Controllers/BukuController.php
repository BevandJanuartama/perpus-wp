<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_buku' => 'required|unique:bukus,kode_buku',
            'judul_buku' => 'required|string|max:255',
            'genre' => 'required|in:Ilmiah,Fantasi,Romantis',
            'jumlah' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
        ]);

        Buku::create($validatedData);

        alert()->success('Success', 'Buku sdh ditambah');

        return redirect()->route('bukus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $bukus = Buku::all();
        return view('buku.show', compact('buku', 'bukus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'kode_buku' => 'required|unique:bukus,kode_buku,' . $buku->id,
            'judul_buku' => 'required|string|max:255',
            'genre' => 'required|in:Ilmiah,Fantasi,Romantis',
            'jumlah' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
        ]);

        $buku->update($validatedData);

        alert()->success('Success', 'Buku sdh diupdate');
        
        return redirect()->route('bukus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        alert()->success('Success', 'tehapus bukunya');

        return redirect()->route('bukus.index');
    }
}
