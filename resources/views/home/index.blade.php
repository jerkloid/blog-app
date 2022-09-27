@extends('layouts.app-master')
@section('content')
    <h1>Home</h1>

    @auth
        <p>Estas autenticado, {{ auth()->user()->name ?? auth()->user()->username }}</p>
        <p>
            <a href="/logout">Logout</a>
        </p>
    @endauth

    @guest
        <p>Estas de invitado para ver contenido <a href="/login">inicia sesion</a></p>
    @endguest

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-4">

                @if ($post->status == 1)
                    <div class="card">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}"><img src="{{ asset($post->img_url) }}"
                            class="card-img-top" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->slug }}</h5>
                        <p class="card-text col-2 text-truncate">{{ $post->content }}</p>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">Leer mas...</a>
                        <p class="card-text">
                            <small class="text-muted">
                                @foreach ($post->tags as $tag)
                                    {{ $tag->name }}
                                @endforeach

                            </small>
                        </p>
                    </div>
                </div>
                @else
                    @auth
                    <div class="card">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}"><img src="{{ asset($post->img_url) }}"
                                class="card-img-top" alt=""></a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->slug }}</h5>
                            <p class="card-text col-2 text-truncate">{{ $post->content }}</p>
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}">Leer mas...</a>
                            <p class="card-text">
                                <small class="text-muted">
                                    @foreach ($post->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach

                                </small>
                            </p>
                        </div>
                    </div>
                    @endauth
                @endif

                @auth
                    @if ($post->status == 1)
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="action" value="0">
                            <button class="btn btn-danger my-3" type="submit">Desactivar</button>


                        </form>
                    @else
                        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="action" value="0">
                            <button class="btn btn-success my-3" type="submit">Activar</button>
                        </form>
                    @endif


                @endauth

            </div>
        @endforeach

    </div>
@endsection
