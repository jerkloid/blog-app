@extends('layouts.auth-master')

@section('content')


        <form method="post" action="/register">
            @csrf
            <h1>Crear cuenta</h1>
            @include('layouts.partials.messages')

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@jorl.fr">
                <label for="exampleInputEmail1" class="form-label">email@jorl.fr</label>
            <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" placeholder="Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Username</label>
                <div id="emailHelp" class="form-text"></div>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" placeholder="contraseña" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">contraseña</label>
                <div id="emailHelp" class="form-text"></div>
              </div>
            <div class="form-floating mb-3">
                <input type="password" name="password_confirmation" placeholder="confirmar contraseña" class="form-control" id="exampleInputPassword1">

              <label for="exampleInputPassword1" class="form-label">confirmar contraseña</label>
            </div>
            <div class="mb-3">
                <a href="/login" class="">Login</a>
              </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </form>
@endsection
