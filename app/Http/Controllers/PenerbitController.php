<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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
            'nama_penerbit' => 'string|max:255|required'
        ]);

        $penerbit = Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
        ]);

        activity()
            ->causedBy(Auth::user())
            ->performedOn($penerbit)
            ->withProperties(['nama_penerbit' => $penerbit->nama_penerbit])
            ->log('Menambahkan Penerbit');

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
            'nama_penerbit' => 'string|max:255|required'
        ]);

        $penerbit = Penerbit::findOrFail($id);

        $penerbit->update([
            'nama_penerbit' => $request->nama_penerbit
        ]);

        activity()
            ->causedBy(Auth::user())
            ->performedOn($penerbit)
            ->withProperties(['nama_penerbit' => $penerbit->nama_penerbit])
            ->log('Mengedit Penerbit');

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

        activity()
            ->causedBy(Auth::user())
            ->performedOn($penerbit)
            ->withProperties(['nama_penerbit' => $penerbit->nama_penerbit])
            ->log('Menghapus Penerbit');

        return redirect()->route('penerbit.index')->with('success', 'Hapus Penerbit Berhasil');
    }

    public function log()
    {
        $logs = Activity::latest()->get();
        return view('pages.log.penerbit', compact('logs'));
    }
}
