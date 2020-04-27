@extends('layouts.app')

@section('content')


<h2>Создание пользователя</h2>

    <form action="/posts" method="POST">
        {{csrf_field()}}
        @include('layouts.errors')
        <div class="form-group">
            <label for="lastname">Фамилия</label>
            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Например: Петров">
        </div>
        <div class="form-group">
            <label for="firstname">Имя</label>
            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Например: Иван">
        </div>
        <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
        <input type="file" name="image">
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>


@endsection
