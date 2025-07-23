<?php

namespace App\Http\Controllers\Api;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PenerbitResource;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::get();

        return new PenerbitResource(true, 'List data penerbit', $penerbits);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_penerbit' => 'required|string|max:255'
        ]);

        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $penerbit = Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit
        ]);

        return new PenerbitResource(true, 'Data penerbit berhasil ditambahkan!', $penerbit);
    }

    public function show($id)
    {
        $penerbit = Penerbit::findOrFail($id);

        return new PenerbitResource(true, 'Data detail penerbit', $penerbit);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'nama_penerbit' => 'required|string|max:255'
        ]);

        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $penerbit = Penerbit::findOrFail($id);

        $penerbit->update([
            'nama_penerbit' => $request->nama_penerbit
        ]);

        return new PenerbitResource(true, 'Update penerbit berhasil!', $penerbit);
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);

        $penerbit->delete();

        return new PenerbitResource(true, 'Penerbit berhasil dihapus!', $penerbit);
    }
}
