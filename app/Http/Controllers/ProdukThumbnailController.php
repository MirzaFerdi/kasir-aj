<?php

namespace App\Http\Controllers;

use App\Models\ProdukThumbnail;
use Illuminate\Http\Request;

class ProdukThumbnailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkThumbnails = ProdukThumbnail::with('produk')->get();
        return response()->json($produkThumbnails);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'url' => 'required|url',
        ]);

        $produkThumbnail = ProdukThumbnail::create($request->all());

        return response()->json($produkThumbnail, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukThumbnail $produkThumbnail)
    {
        $produkThumbnail->load('produk');
        return response()->json($produkThumbnail);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdukThumbnail $produkThumbnail)
    {
        $request->validate([
            'produk_id' => 'sometimes|required|exists:produks,id',
            'url' => 'sometimes|required|url',
        ]);

        $produkThumbnail->update($request->all());

        return response()->json($produkThumbnail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukThumbnail $produkThumbnail)
    {
        $produkThumbnail->delete();
        return response()->json(null, 204);
    }
}
