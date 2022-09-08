@extends('layouts.app-master')
@section('content')
        <h1>Home</h1>

        @auth
            <p>Estas autenticado, {{ auth()->user()->name ?? auth()->user()->username}}</p>
            <p>
                <a href="/logout">Logout</a>
            </p>
        @endauth

        @guest
            <p>Estas de invitado para ver contenido <a href="/login">inicia sesion</a></p>
        @endguest

@endsection
