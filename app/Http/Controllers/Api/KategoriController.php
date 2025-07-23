<?php

namespace App\Http\Controllers\Api;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::get();

        return new KategoriResource(true, 'List data kategori', $kategoris);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255'
        ]);

        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return new KategoriResource(true, 'Data kategori berhasil ditambahkan!', $kategori);
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return new KategoriResource(true, 'Data detail kategori', $kategori);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255'
        ]);

        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return new KategoriResource(true, 'Update kategori berhasil!', $kategori);
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return new KategoriResource(true, 'Kategori berhasil dihapus!', $kategori);
    }
}
