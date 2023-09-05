<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = ['barang' => Barang::all()];
        return view('barang.index', $data);
    }
    public function insert()
    {
        return view('barang.insert');
    }
    public function edit(Request $request)
    {
        $data = ['barang'=>Barang::query()->firstWhere('id_barang',$request->id)];
        return view('barang.edit',$data);
    }
    public function add()
    {
        $validated = request()->validate([
            'nama_barang' => 'required',
            'barcode'     => 'required',
        ]);
        if ($validated) {
            $id = request()->only('id_barang');
            return $id
                ? (Barang::query()->where('id_barang', $id)->update($validated)
                    ? redirect('/dashboard/barang')->with('Success', 'Barang edited')
                    : redirect('/dashboard/barang/edit')->with('Failed', 'Barang failed to edit'))
                : (Barang::create($validated)
                    ? redirect('/dashboard/barang')->with('Success', 'Barang added')
                    : redirect('/dashboard/barang/insert')->with('Failed', 'Barang failed to add'));
        }
    }
    public function delete(Request $request)
    {
        $deleted = Barang::query()->find($request->id,'id_barang')->delete();
        return $deleted ? response()->json(['Success' => true]) : response()->json(['Success' => false]);
    }
}