<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with(['user', 'detailTransaksi.produk'])->get();
        return response()->json($transaksi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $transaksi = Transaksi::create($request->all());

        return response()->json($transaksi, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['user', 'detailTransaksi.produk']);
        return response()->json($transaksi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'tanggal' => 'sometimes|required|date',
            'total' => 'sometimes|required|numeric',
        ]);

        $transaksi->update($request->all());

        return response()->json($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return response()->json(null, 204);
    }
}
