@extends('layouts.app')


@section('content')

<h1>Code goes here</h1>
@if (count($people))
<ul>
    @foreach ($people as $person)

        <li>{{$person}}</li>
        
    @endforeach
</ul>
@endif

@stop

@section('footer')

<script>
    alert('hey, uve just seen me?')
</script>

@stop