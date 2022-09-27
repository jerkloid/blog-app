@extends('layouts.auth-master')

@section('content')
<div class="container border">
            <form method="post" action="/login">
            @csrf
            <a class="btn btn-info my-3" href="/">inicio</a>
            <h1 class="mt-3">iniciar sesion</h1>

            @include('layouts.partials.messages')

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username o email</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">privado es</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <a href="/register" class="">Crear usuario</a>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Login</button>
            </form>
</div>
@endsection
