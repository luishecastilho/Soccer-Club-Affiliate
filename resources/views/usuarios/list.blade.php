@extends('master')

@section('content')
    <h1>list usuarios</h1>
    <ul>
    @foreach($usuarios as $usuario)
        <li>{{ $usuario["name"] }}</li>
    @endforeach
    </ul>
@endsection