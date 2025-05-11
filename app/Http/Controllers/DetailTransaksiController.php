<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailTransaksi = DetailTransaksi::with(['transaksi', 'produk'])->get();
        return response()->json($detailTransaksi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'transaksi_id' => 'required|exists:transaksis,id',
            'jumlah_produk' => 'required|integer|min:1',
        ]);
        $detailTransaksi = DetailTransaksi::create($request->all());
        return response()->json($detailTransaksi, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->load(['transaksi', 'produk']);
        return response()->json($detailTransaksi);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        $request->validate([
            'produk_id' => 'sometimes|required|exists:produks,id',
            'transaksi_id' => 'sometimes|required|exists:transaksis,id',
            'jumlah_produk' => 'sometimes|required|integer|min:1',
        ]);
        $detailTransaksi->update($request->all());
        return response()->json($detailTransaksi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->delete();
        return response()->json(null, 204);
    }
}
