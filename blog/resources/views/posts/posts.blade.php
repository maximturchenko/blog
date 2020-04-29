@extends('layouts.app')



@section('content')

@php
//dd($posts)
@endphp
    @foreach($posts as $post)
     {{$post->content}}
     {{$post->user_id}}


     <img src="{{storage_path()}}\{{$post->image}}" alt="">
    @endforeach
@endsection
