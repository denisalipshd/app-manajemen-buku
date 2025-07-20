@extends('layouts.app')

@section('title', 'Halaman Buku')

@section('content')

      @include('includes.navbar')

      <h3 class="py-2">Daftar Buku</h3>
      @can('create.buku')
        <a href="{{ route('buku.add') }}" class="tombol">Tambah</a>
      @endcan
      @can('view.log')
        <a href="{{ route('buku.log') }}" class="tombol">Riwayat</a>
      @endcan
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
              <th>Judul</th>
              <th>Pengarang</th>
              <th>Tahun Terbit</th>
              <th>Kategori</th>
              <th>Penerbit</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bukus as $buku)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->kategori->nama_kategori }}</td>
                <td>{{ $buku->penerbit->nama_penerbit }}</td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    @can('view.buku')
                    <a href="{{ route('buku.show', $buku->id) }}" class="tombol" title="Detail">
                      <i class="fas fa-info-circle"></i>
                    </a>
                    @endcan
                    @can('edit.buku')
                    <a href="{{ route('buku.edit', $buku->id) }}" class="tombol" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    @endcan
                    @can('delete.buku')
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="form-delete" style="display: inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="tombol" title="Hapus">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                    @endcan
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection