<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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
            'nama_kategori' => 'string|max:255|required'
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        activity()
            ->causedBy(Auth::user())
            ->performedOn($kategori)
            ->withProperties(['nama_kategori' => $kategori->nama_kategori])
            ->log('Menambahkan Kategori');

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
            'nama_kategori' => 'string|max:255|required'
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

         activity()
            ->causedBy(Auth::user())
            ->performedOn($kategori)
            ->withProperties(['nama_kategori' => $kategori->nama_kategori])
            ->log('Mengedit Kategori');

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

         activity()
            ->causedBy(Auth::user())
            ->performedOn($kategori)
            ->withProperties(['nama_kategori' => $kategori->nama_kategori])
            ->log('Menghapus Kategori');

        return redirect()->route('kategori.index')->with('success', 'Hapus Kategori Berhasil');
    }

    public function log()
    {
        $logs = Activity::latest()->get();
        return view('pages.log.kategori', compact('logs'));
    }
}
