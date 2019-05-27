@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda1')
@endsection
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            DASHBOARD ADMINISTRADOR
        </h3>


@endsection
