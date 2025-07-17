@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')

        @include('includes.navbar')

        <h3 class="py-2">Detail Buku</h3>

        <table>
            <tbody>
                    <tr>
                        <td width="200px">Judul Buku</td>
                        <td width="2px">:</td>
                        <td>{{ $buku->judul }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Pengarang</td>
                        <td width="2px">:</td>
                        <td>{{ $buku->pengarang}}</td>
                    </tr>
                    <tr>
                        <td width="200px">Tahun Terbit</td>
                        <td width="2px">:</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Kategori</td>
                        <td width="2px">:</td>
                        <td>{{ $buku->kategori->nama_kategori }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Penerbit</td>
                        <td width="2px">:</td>
                        <td>{{ $buku->penerbit->nama_penerbit }}</td>
                    </tr>
            </tbody>
        </table>

@endsection