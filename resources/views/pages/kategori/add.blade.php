@extends('layouts.app')

@section('title', 'Add Kategori')

@section('content')

    @include('includes.navbar')

        <h3 class="py-2">Buat Kategori</h3>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori">
            </div>

            <button type="submit" class="tombol">Submit</button>
        </form>

@endsection