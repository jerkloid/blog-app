@extends('layouts.app-master')
@section('content')
    @foreach ($posts as $post)
    @if ($post->status == 1)
        <div class="container">
            <a class="btn btn-info my-3" href="/">inicio</a>
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


            @include('layouts.partials.messages')
            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <img src="{{ asset($post->img_url) }}" class="card-img-top" alt="" width="400" height="400">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic"></h1>

                </div>
            </div>

        </div>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">



                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $post->slug }}</h2>
                        <p class="blog-post-meta">{{ $post->created_at->format('d-m-Y') }}</p> por
                        {{ $users->username }}
                        </p>


                        <hr>
                        <p>{{ $post->content }}</p>


                    </div><!-- /.blog-post -->


                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h4 class="font-italic">Categoria</h4>
                        <p class="mb-0">{{ $categories->name }}</p>
                    </div>

                    <div class="p-3">
                        <h1 class="font-italic">Tags</h1>
                        <ol class="list-unstyled mb-0">
                            @foreach ($post->tags as $tag )
                            <h2><li>{{ $tag->name }}</li></h2>
                            @endforeach




                        </ol>
                    </div>


                </aside><!-- /.blog-sidebar -->

            </div><!-- /.row -->

        </main><!-- /.container -->
    @else
        @guest
           <h1> Post eliminado </h1><a class="btn btn-info my-3" href="/">inicio</a>
        @endguest
        @auth
        <div class="container">
            <a class="btn btn-info my-3" href="/">inicio</a>
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


            @include('layouts.partials.messages')
            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <img src="{{ asset($post->img_url) }}" class="card-img-top" alt="" width="400" height="400">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic"></h1>

                </div>
            </div>

        </div>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">



                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $post->slug }}</h2>
                        <p class="blog-post-meta">{{ $post->created_at->format('d-m-Y') }}</p> por
                        {{ $users->username }}
                        </p>


                        <hr>
                        <p>{{ $post->content }}</p>


                    </div><!-- /.blog-post -->


                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h4 class="font-italic">Categoria</h4>
                        <p class="mb-0">{{ $categories->name }}</p>
                    </div>

                    <div class="p-3">
                        <h1 class="font-italic">Tags</h1>
                        <ol class="list-unstyled mb-0">
                            @foreach ($post->tags as $tag )
                            <h2><li>{{ $tag->name }}</li></h2>
                            @endforeach




                        </ol>
                    </div>


                </aside><!-- /.blog-sidebar -->

            </div><!-- /.row -->

        </main><!-- /.container -->
        @endauth
    @endif




    @endforeach







    <footer class="blog-footer">

        <a class="btn btn-primary" href="#">Back to top</a>
        </p>
    </footer>

    <!-- Bootstrap core JavaScript
                          ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>
@endsection
