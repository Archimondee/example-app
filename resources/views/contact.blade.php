@extends('layout.app')

@section('content')
    <h1>Contact Page </h1>

    @if (count($people))
    <ul>
        @foreach ($people as $person)
            <li> {{$person}} </li>
        @endforeach
    </ul>
    @endif
@endsection

@section('footer')
    <h2>Footer </h2>
@endsection
