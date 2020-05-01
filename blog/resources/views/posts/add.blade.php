@extends('layouts.app')

@section('content')


<h2>Создание пользователя</h2>

    <form action="/posts" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        @include('layouts.errors')
        <div class="form-group">
            <label for="title">Заголовок поста</label>
            <input class="form-control" type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <textarea class="form-control" id="tiny-mc" name="content"></textarea>
            <label for="image">Картинка на превью</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
