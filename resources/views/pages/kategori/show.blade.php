@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')

    @include('includes.navbar')
    <h3>Detail Kategori</h3>

        <table>
            <tbody>
                    <tr>
                        <td width="200px">Nama Kategori</td>
                        <td width="2px">:</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                    </tr>
            </tbody>
        </table>

@endsection