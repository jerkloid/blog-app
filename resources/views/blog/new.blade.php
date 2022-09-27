@extends('layouts.app-master')
@section('content')
@auth
<div class="container border p-4 mt-4">
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        @include('layouts.partials.messages')
        <label for="slug" class="form-label">Titulo del post</label>
        <div class="input-group mb-3">
            <input type="text" id="slug" name="slug" class="form-control"  placeholder="Titulo del post">
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

              </select>
        </div>
        <span class="input-group-text">Tags</span>


        @foreach ($tags as $tags )
        <div class="form-check">
            <input class="form-check-input" name="tag[]" type="checkbox" value="{{ $tags->id }}" id="{{ $tags->id }}">
            <label class="form-check-label" for="{{ $tags->id }}">{{ $tags->name }}</label>
        </div>
        @endforeach



    <div class="mb-3">
        <label for="formFile" class="form-label">Imagen principal del post Max: 2MB</label>
        <input class="form-control" type="file" id="formFile" name="img_url" accept="image/*">
    </div>

    <div class="input-group">
        <span class="input-group-text">Contenido del post</span>
        <textarea class="form-control" aria-label="With textarea" name="content" id="content"></textarea>
    </div>
    <div class="input-group mt-3 float-right">
        <button type="submit" class="btn btn-primary btn-lg ">Crear</button>
    </div>

    </form>


</div>
@endauth

@endsection
