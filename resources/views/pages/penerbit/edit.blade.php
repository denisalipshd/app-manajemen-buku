@extends('layouts.app')

@section('title', 'Edit Penerbit')

@section('content')

    @include('includes.navbar')

        <h3 class="py-2">Edit Penerbit</h3>

        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Penerbit</label>
                <input type="text" name="nama" value="{{ $penerbit->nama }}">
            </div>

            <button type="submit" class="tombol">Submit</button>
        </form>

@endsection