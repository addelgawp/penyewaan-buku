<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $books = Buku::with(['kategori', 'penerbit'])->get();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        $category = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('category', 'penerbit'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:bukus',
            'nama' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbit,id',
            'isbn' => 'required|unique:bukus',
            'pengarang' => 'required',
            'jumlah_halaman' => 'required|numeric',
            'stok' => 'required|numeric',
            'tahun_terbit' => 'required|digits:4',
            'sinopsis' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/buku', $nama_gambar);
            $validatedData['gambar'] = $nama_gambar;
        }

        Buku::create($validatedData);

        return redirect()->route('buku.index')->with('sukses', 'Buku berhasil ditambahkan');
    }

    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('buku', 'kategori', 'penerbit'));
    }

    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:bukus,kode,' . $buku->id,
            'nama' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbit,id',
            'isbn' => 'required|unique:bukus,isbn,' . $buku->id,
            'pengarang' => 'required',
            'jumlah_halaman' => 'required|numeric',
            'stok' => 'required|numeric',
            'tahun_terbit' => 'required|digits:4',
            'sinopsis' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($buku->gambar) {
                Storage::delete('public/buku/' . $buku->gambar);
            }
            
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/buku', $nama_gambar);
            $validatedData['gambar'] = $nama_gambar;
        }

        $buku->update($validatedData);

        return redirect()->route('buku.index')->with('sukses', 'Buku berhasil diperbarui');
    }


    public function destroy(Buku $buku)
    {
        if ($buku->gambar) {
            Storage::delete('public/buku/' . $buku->gambar);
        }
        
        $buku->delete();

        return redirect()->route('buku.index')->with('sukses', 'Buku berhasil dihapus');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }
}
