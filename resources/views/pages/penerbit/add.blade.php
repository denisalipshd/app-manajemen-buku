@extends('layouts.app')

@section('title', 'Add Penerbit')

@section('content')

    @include('includes.navbar')

        <h3 class="py-2">Buat Penerbit</h3>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('penerbit.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Penerbit</label>
                <input type="text" name="nama_penerbit">
            </div>

            <button type="submit" class="tombol">Submit</button>
        </form>

@endsection