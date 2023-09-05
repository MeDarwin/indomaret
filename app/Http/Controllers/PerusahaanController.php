<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerusahaanController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = Perusahaan::query();
    }
    public function index(): View
    {
        $data = ['perusahaan' => $this->model->first()];
        return view('perusahaan.index', $data);
    }
    public function edit()
    {
        $data = ['perusahaan' => $this->model->first()];
        return view('perusahaan.edit', $data);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id_perusahaan' => ['required'],
            'nama'          => ['required'],
            'alamat'        => ['required'],
            'npwp'          => ['required'],
        ]);
        if ($validated) {
            Perusahaan::where('id_perusahaan', $request->get('id_perusahaan'))
                ->update($validated);
            return redirect('/dashboard/perusahaan')->with('Success', 'Data updated');
        }
        return redirect('/dashboard/perusahaan')->with('Failed', 'Data not updated');
    }
}