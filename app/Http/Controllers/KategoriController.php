<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategories = Kategori::latest()->get();
        return view('pages.kategori.index', compact('kategories'));
    }

    public function add()
    {
        return view('pages.kategori.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string|max:255|required'
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Tambah Kategori Berhasil');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('pages.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'string|max:255|required'
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('kategori.index')->with('success', 'Edit Kategori Berhasil');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('pages.kategori.show', compact('kategori'));
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Hapus Kategori Berhasil');
    }
}
