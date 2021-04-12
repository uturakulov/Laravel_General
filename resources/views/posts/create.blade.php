@extends('layouts.app')


@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'PostController@store', 'files'=>true]) !!}
    
    <div class="form-group">
        {!! Form::file('file', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">

        {!! Form::label('title', 'Text:') !!}
        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'enter title']) !!}
        {!! Form::text('content', null, ['class'=>'form-control', 'placeholder'=>'enter content']) !!}
        {!! Form::text('author', null, ['class'=>'form-control', 'placeholder'=>'enter author']) !!}

    </div>
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        {{csrf_field()}}
    {!! Form::close() !!}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ol>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{$error}}</li>
                @endforeach
            </ol>
        </div>
    @endif

@endsection
