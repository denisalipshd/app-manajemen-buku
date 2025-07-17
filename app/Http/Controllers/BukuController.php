<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->get();
        return view('pages.buku.index', compact('bukus'));
    }

    public function add()
    {
        $kategories = Kategori::all();
        $penerbits = Penerbit::all();

        return view('pages.buku.add', compact('kategories', 'penerbits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'string|max:255|required',
            'pengarang' => 'string|max:255|required',
            'tahun_terbit' => 'digits:4|required',
            'kategori_id' => 'integer|required|exists:kategoris,id',
            'penerbit_id' => 'integer|required|exists:penerbits,id',
        ]);

        Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id
        ]);

        return redirect()->route('buku.index')->with('success', 'Tambah Buku Berhasil');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategories = Kategori::all();
        $penerbits = Penerbit::all();

        return view('pages.buku.edit', compact('buku', 'kategories', 'penerbits'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'string|max:255|required',
            'pengarang' => 'string|max:255|required',
            'tahun_terbit' => 'digits:4|required',
            'kategori_id' => 'integer|required|exists:kategoris,id',
            'penerbit_id' => 'integer|required|exists:penerbits,id',
        ]);

        $buku = Buku::findOrFail($id);

        $buku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id
        ]);

        return redirect()->route('buku.index')->with('success', 'Edit Buku Berhasil');
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('pages.buku.show', compact('buku'));
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Hapus Buku Berhasil');
    }
}
