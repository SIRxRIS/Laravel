<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exist:siswas,id',
            'jumlah' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return pembayaran::with('siswa')->findOrfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran-> update($request->all());

        return response()->json($pembayaran, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pembayaran::destroy($id);

        return response()->json(null, 204);
    }
}
