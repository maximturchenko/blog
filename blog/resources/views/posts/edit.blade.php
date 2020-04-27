@extends('layouts.app')

@section('content')

@can('update-message' , $message)
<h2>Редактирование пользователя </h2>
<form action="/posts/{{$user->id_user}}" method="POST">
     {{csrf_field()}}
     @method('PUT')
    @include('layouts.errors')
    <div class="form-group">
        <label for="lastname">Фамилия</label>
        <input class="form-control" type="text" id="lastname" name="lastname" value="{{$user->lastname}}">
    </div>
    <div class="form-group">
        <label for="firstname">Имя</label>
        <input class="form-control" type="text" id="firstname" name="firstname" value="{{$user->firstname}}">
    </div>
    <div class="form-group">
        <label for="middlename">Отчество</label>
        <input class="form-control" type="text" id="middlename" name="middlename" value="{{$user->middlename}}">
    </div>
    <div class="form-group">
        <label for="phone">Телефон</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{$user->email}}">
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>
@else


<p>Вы только можете изменять свои записи</p>

@endcan

@endsection
