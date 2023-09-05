<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
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
    public function add(Request $request)
    {
        $validated = $request->validate([
            'harga' => 'numeric',
            'stok'  => 'integer'
        ]);
        $validated['id_cabang'] = $request->id;
        $validated['id_barang'] = $request->id_barang;
        return Stok::updateOrCreate(
            ['id_cabang' => $request->id, 'id_barang' => $request->id_barang],
            $validated
        )
            ? response()->json(['Success' => true])
            : response()->json(['Success' => false]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return Stok::query()
            ->where('id_cabang', $request->id)
            ->where('id_barang', $request->id_barang)
            ->delete()
            ? response()->json(['Success' => true])
            : response()->json(['Success' => false]);
    }
}