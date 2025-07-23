<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BukuResource;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with(['kategori', 'penerbit'])->get();

        return new BukuResource(true, 'List data buku', $bukus);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric|digits:4',
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbits,id',
        ]);

        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $buku = Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
        ]);

        return new BukuResource(true, 'Data buku berhasil ditambahkan!', $buku);
    }

    public function show($id)
    {
        $buku = Buku::with(['kategori', 'penerbit'])->find($id);

        if(!$buku) {
            return new BukuResource(false, 'Data buku tidak ditemukan!', null);
        }

        return new BukuResource(true, 'Detail data buku', $buku);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric|digits:4',
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbits,id',
        ]);

        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $buku = Buku::findOrFail($id);

        if(!$buku) {
            return new BukuResource(false, 'Data buku tidak ditemukan!', null);
        }

        $buku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
        ]);

        return new BukuResource(true, 'Update buku berhasil!', $buku);
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if(!$buku) {
            return new BukuResource(false, 'Data buku tidak ditemukan!', null);
        }

        $buku->delete();

        return new BukuResource(true, 'Buku berhasil dihapus!', $buku);
    }
}
