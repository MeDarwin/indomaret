<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cabang;
use App\Models\Stok;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    protected $req;
    public function index()
    {
        $data = ['cabang' => Cabang::all()];
        return view('cabang.index', $data);
    }
    public function insert()
    {
        return view('cabang.insert');
    }
    public function add(Request $request)
    {
        $validated = request()->validate([
            'nama'          => 'required',
            'kontak_cabang' => 'required',
            'kode_cabang'   => 'required',
            'alamat'        => 'required',
        ]);
        if ($validated) {
            $id = request()->only('id_cabang');
            $validated['id_perusahaan'] = 1;
            return $id
                ? (Cabang::query()->where('id_cabang', $id)->update($validated)
                    ? redirect('/dashboard/cabang')->with('Success', 'Cabang edited')
                    : redirect('/dashboard/cabang/edit')->with('Failed', 'Cabang failed to edit'))
                : (Cabang::create($validated)
                    ? redirect('/dashboard/cabang')->with('Success', 'Cabang added')
                    : redirect('/dashboard/cabang/insert')->with('Failed', 'Cabang failed to add'));
        }
    }
    public function delete(Request $request)
    {
        $deleted = Cabang::query()->find($request->id, 'id_cabang')->delete();
        return $deleted ? response()->json(['Success' => true]) : response()->json(['Success' => false]);
    }
    public function edit(Request $request)
    {
        $data = ['cabang' => Cabang::query()->firstWhere('id_cabang', $request->id)];
        return view('cabang.edit', $data);
    }
    public function detail(Request $request)
    {
        $this->req = $request;
        $data = [
            'cabang'               => Cabang::query()->firstWhere('id_cabang', $request->id),
            'all_unadded_barang'   => Barang::with('stok')->doesntHave('stok')->orWhereRelation('stok','id_cabang','<>',$request->id)->get(['*']),//! need to fix
            'all_available_barang' => Stok::with('barang')->whereRelation('barang', 'id_cabang', $request->id)->get(['*']),
        ];
        // return $data;
        return view('cabang.detail', $data);
    }
}