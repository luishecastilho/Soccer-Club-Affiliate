@extends('master')
@extends('layouts.sidebar')

@section('content')
    <UsuariosList :usuarios={{ $usuarios }}>
@endsection

</main>
