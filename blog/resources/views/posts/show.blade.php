@extends('layouts.app')

@section('content')
    <article class="all">
        <div class="article_image">
            <a href="#">
                <img src="{{ url('storage/'.$post->image) }}" alt="{{ $post->title }}" title="{{ $post->title }}">
            </a>
        </div>
        <div class="post">
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <p>
                 {!! $post->content !!}
            </p>
        </div>
    </article>
@endsection
