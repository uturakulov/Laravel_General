@extends('layouts.app')


@section('content')

<a href="{{route('posts.edit', $post->id)}}">{{$post->content}}</a>
  
@endsection