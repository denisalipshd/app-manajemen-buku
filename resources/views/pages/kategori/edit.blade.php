@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

    @include('includes.navbar')

        <h3 class="py-2">Edit Kategori</h3>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama" value="{{ $kategori->nama }}">
            </div>

            <button type="submit" class="tombol">Submit</button>
        </form>

@endsection