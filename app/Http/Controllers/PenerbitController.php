<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = \App\Models\Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }

    public function store(Request $request)
    {
        \App\Models\Penerbit::create($request->all());

        return redirect('penerbit')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function edit(Penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, Penerbit $penerbit)
    {
        $request->validate([
            'kode' => 'required|unique:penerbit,kode,' . $penerbit->id,
            'nama' => 'required'
        ]);

        $penerbit->update($request->all());

        return redirect()->route('penerbit.index')->with('sukses', 'Penerbit Berhasil Diperbarui');
    }

    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

            
        return redirect()->route('penerbit.index')->with('sukses', 'Penerbit Berhasil Dihapus');
    }
}
