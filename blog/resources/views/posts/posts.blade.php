@extends('layouts.app')



@section('content')


    @foreach($posts as $post)
        <article>
            <div class="article_image">
                <a href="/post/{{$post->id}}">
                    <img src="{{ url('storage/'.$post->image) }}" alt="{{ $post->title }}" title="{{ $post->title }}">
                </a>
            </div>
            <div class="post">
                <h1 class="title">
                    <a href="/post/{{$post->id}}">{{ $post->title }}</a>
                </h1>
                <p>
                     {!! Str::limit($post->content, 272) !!}
                </p>
                <a class="read_more" href="/post/{{$post->id}}">Продолжить чтение <i class="read_more_arrow"></i> </a>
            </div>
        </article>
    @endforeach


    {{ $posts->links("layouts.travelblogpagination") }}
@endsection
