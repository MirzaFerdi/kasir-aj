<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::with(['thumbnail', 'detailTransaksi'])->get();
        return response()->json($produk);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $produk = Produk::create($request->all());

        return response()->json($produk, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $produk->load(['thumbnail', 'detailTransaksi']);
        return response()->json($produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'sometimes|required|string|max:255',
            'stok' => 'sometimes|required|integer',
            'harga' => 'sometimes|required|numeric',
        ]);

        $produk->update($request->all());

        return response()->json($produk);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json(null, 204);
    }
}
