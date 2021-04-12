@extends('layouts.app')


@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostController@update', $post->id]]) !!}
    <div class="form-group">

        {{csrf_field()}}
        
        {!! Form::label('title', 'Text:') !!}
        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'enter title']) !!}
        {!! Form::text('content', null, ['class'=>'form-control', 'placeholder'=>'enter content']) !!}
        {!! Form::text('author', null, ['class'=>'form-control', 'placeholder'=>'enter author']) !!}

    </div>
    {!! Form::submit('Edit', ['class'=>'btn btn-info']) !!}
    {!! Form::close() !!}


    {{-- <form action="/posts/{{$post->id}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value="{{$post->title}}">
        <input type="text" name="content" value="{{$post->content}}">
        <input type="text" name="author" value="{{$post->author}}">
        <input type="submit" name="submit" value="Submit">
    </form> --}}

    {!! Form::model($post, ['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id]]) !!}
        {{csrf_field()}}
        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection