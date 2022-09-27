@extends('layouts.app-master')
@section('content')



@auth
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('categories.store') }}" method="post">
        @method('POST')
        @csrf
        @include('layouts.partials.messages')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la cate</label>
            <input type="text" class="form-control" name="name">
          </div>
          <button type="submit" class="btn btn-primary mb-3">Crear categ</button>
          <h1 class="my-3">Eliminar</h1>

    </form>
<ul class="list-group">
@if ($categories->count() > 0)
            @foreach ($categories as $category)
            <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                @method('DELETE')
                @csrf
                <li class="list-group-item"><button class="btn btn-danger btn-sm">{{ $category->name }}</button></li>
            </form>


            @endforeach

        @else
        <li class="list-group-item">No hay categorias</li>
        @endif




          </ul>
</div>
@endauth


@endsection
