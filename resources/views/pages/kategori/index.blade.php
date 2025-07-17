@extends('layouts.app')

@section('title', 'Halaman Kategori')

@section('content')

      @include('includes.navbar')

      <h3 class="py-2">Daftar Kategori</h3>
      <a href="{{ route('kategori.add') }}" class="tombol pb-2">Tambah</a>
      <a href="{{ route('kategori.log') }}" class="tombol">Riwayat</a>
      <form action="{{ route('logout') }}" method="POST" style="display: inline">
        @csrf
        <button type="submit" class="tombol">Logout</button>
      </form>

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
              <th>Nama Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kategories as $kategori)
              <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kategori->nama_kategori }}</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <a href="{{ route('kategori.show', $kategori->id) }}" class="tombol" title="Detail">
                    <i class="fas fa-info-circle"></i>
                  </a>
                  <a href="{{ route('kategori.edit', $kategori->id) }}" class="tombol" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="form-delete" style="display: inline">
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