<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = \App\Models\Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        \App\Models\Kategori::create($request->all());

        return redirect('kategori')->with('sukses', 'Data Anda Berhasil Disimpan');
    }

    public function edit($id)
    {
        $kategori = \App\Models\Kategori::find($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = \App\Models\Kategori::find($id);

        $kategori->kode = $request->kode;
        $kategori->nama = $request->nama;
        $kategori->update();

        return redirect('kategori')->with('sukses', 'Data Anda Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $kategori = \App\Models\Kategori::find($id);
        $kategori->delete();

        return redirect('kategori')->with('sukses', 'Data Anda Berhasil Dihapus');
    }
}
