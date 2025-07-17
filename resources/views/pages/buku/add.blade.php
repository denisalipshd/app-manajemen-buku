@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

        @include('includes.navbar')

        <h3 class="py-2">Tambah Buku</h3>
        
        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul">
            </div>

             <div class="form-group">
                <label>Pengarang</label>
                <input type="text" name="pengarang">
            </div>

             <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit">
            </div>

             <div class="form-group">
                <label>Kategori Buku</label>
                <select name="kategori_id">
                    @foreach ($kategories as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>

             <div class="form-group">
                <label>Penerbit</label>
                <select name="penerbit_id">
                    @foreach ($penerbits as $penerbit)
                        <option value="{{ $penerbit->id }}">{{ $penerbit->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="tombol">Submit</button>
        </form>

@endsection