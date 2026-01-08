<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Buku',
            'data'    => $bukus
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_buku'  => 'required|unique:bukus,kode_buku',
            'judul_buku' => 'required|string|max:255',
            'genre'      => 'required|in:Ilmiah,Fantasi,Romantis',
            'jumlah'     => 'required|integer|min:0',
            'deskripsi'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $buku = Buku::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Buku sdh ditambah',
            'data'    => $buku
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Buku',
            'data'    => $buku
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'kode_buku'  => 'required|unique:bukus,kode_buku,' . $id,
            'judul_buku' => 'required|string|max:255',
            'genre'      => 'required|in:Ilmiah,Fantasi,Romantis',
            'jumlah'     => 'required|integer|min:0',
            'deskripsi'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $buku->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Buku sdh diupdate',
            'data'    => $buku
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }

        $buku->delete();

        return response()->json([
            'success' => true,
            'message' => 'tehapus bukunya',
        ], 200);
    }
}