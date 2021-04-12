@extends('layouts.app')


@section('content')

<ul>

    @foreach ($posts as $post)

        <div class="image-container">
            <img width="100" src="{{$post->path}}" alt="">
        </div>

        <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
    @endforeach

</ul>


@endsection

