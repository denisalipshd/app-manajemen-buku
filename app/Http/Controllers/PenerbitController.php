<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::latest()->get();
        return view('pages.penerbit.index', compact('penerbits'));
    }

    public function add()
    {
        return view('pages.penerbit.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string|max:255|required'
        ]);

        Penerbit::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('penerbit.index')->with('success', 'Tambah Penerbit Berhasil');
    }

    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('pages.penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'string|max:255|required'
        ]);

        $penerbit = Penerbit::findOrFail($id);

        $penerbit->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('penerbit.index')->with('success', 'Edit Penerbit Berhasil');
    }

    public function show($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('pages.penerbit.show', compact('penerbit'));
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);

        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'Hapus Penerbit Berhasil');
    }
}
