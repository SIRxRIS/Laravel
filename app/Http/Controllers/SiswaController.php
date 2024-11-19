<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    
    public function index(
        
    )
    {
        return Siswa::with('pembayaran')->get();//
    }
    
    
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
            'nama' => 'required|string|max:255'
        ]);

        $siswa = Siswa::create($validated);

        return response()->json($siswa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Siswa::with('pembayaran')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update(request->all());

        return response()->json($siswa, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Siswa::destroy($id);

        return response()->json(null, 204) ;
    }
}
