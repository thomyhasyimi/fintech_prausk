@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center">
        <div class="flex justify-center container">
            @if ($user->role == 'siswa')
                <p>Selamat Datang, {{$user}}</p>
            @endif
            {{-- @if ($user->role == 'kantin')
                <p>Selamat Datang, {{$user}}</p>
                <button type="submit"><a href="logout">Logout</a></button>
            @endif --}}
            @if ($user->role == 'bank')
                <p>Selamat Datang, {{$user}}</p>
            @endif
        </div>
    </div>
@endsection