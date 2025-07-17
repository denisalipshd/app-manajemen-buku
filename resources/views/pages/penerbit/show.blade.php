@extends('layouts.app')

@section('title', 'Detail Penerbit')

@section('content')

    @include('includes.navbar')
    <h3>Detail Penerbit</h3>

        <table>
            <tbody>
                    <tr>
                        <td width="200px">Nama Penerbit</td>
                        <td width="2px">:</td>
                        <td>{{ $penerbit->nama }}</td>
                    </tr>
            </tbody>
        </table>

@endsection