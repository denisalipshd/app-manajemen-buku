@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

        @include('includes.navbar')

        <h3 class="py-2">Edit Buku</h3>
        
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul" value="{{ $buku->judul }}">
            </div>

             <div class="form-group">
                <label>Pengarang</label>
                <input type="text" name="pengarang" value="{{ $buku->pengarang }}">
            </div>

             <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit" value="{{ $buku->tahun_terbit }}">
            </div>

             <div class="form-group">
                <label>Kategori Buku</label>
                <select name="kategori_id">
                    @foreach ($kategories as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id === $buku->kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>

             <div class="form-group">
                <label>Penerbit</label>
                <select name="penerbit_id">
                    @foreach ($penerbits as $penerbit)
                        <option value="{{ $penerbit->id }}" {{ $penerbit->id === $buku->penerbit->id ? 'selected' : '' }}>{{ $penerbit->nama }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="tombol">Submit</button>
        </form>

@endsection