@extends('layouts.app-master')
@section('content')



@auth
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('tag_save') }}" method="post">
        @method('POST')
        @csrf
        {{-- @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        @error('title')
            <h6 class="alert alert-danger">{{ $message }}</h6>

        @enderror --}}
        @include('layouts.partials.messages')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Tag</label>
            <input type="text" class="form-control" name="name">
          </div>
          <button type="submit" class="btn btn-primary mb-3">Crear Tag</button>
          <h1 class="my-3">Eliminar</h1>

    </form>
<ul class="list-group">
@if ($tags->count() > 0)
            @foreach ($tags as $tag)
            <form method="POST" action="{{ route('tag_destroy', ['id' => $tag->id]) }}">
                @method('DELETE')
                @csrf
                <li class="list-group-item"><button class="btn btn-danger btn-sm">{{ $tag->name }}</button></li>
            </form>


            @endforeach

        @else
        <li class="list-group-item">No hay tags</li>
        @endif




          </ul>
</div>
@endauth


@endsection
