@extends('layouts.app')

@section('title', 'Log Activity')

@section('content')

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Deskripsi</th>
                <th>Data</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->causer ? $log->causer->name : 'Unknown' }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->properties['judul'] ?? '-' }}</td>
                    <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection