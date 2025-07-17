@extends('layouts.app')

@section('title', 'Halaman Penerbit')

@section('content')

      @include('includes.navbar')

      <h3 class="py-2">Daftar Penerbit</h3>
      <a href="{{ route('penerbit.add') }}" class="tombol">Tambah</a>

      <div class="table-responsive mt-2">
         @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table>
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Penerbit</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($penerbits as $penerbit)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $penerbit->nama }}</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <a href="{{ route('penerbit.show', $penerbit->id) }}" class="tombol" title="Detail">
                    <i class="fas fa-info-circle"></i>
                  </a>
                  <a href="{{ route('penerbit.edit', $penerbit->id) }}" class="tombol" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('penerbit.destroy', $penerbit->id) }}" method="POST" class="form-delete" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="tombol" title="Hapus">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>

@endsection