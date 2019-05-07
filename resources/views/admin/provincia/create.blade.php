@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>
            Nueva Provincia
        </h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

			{!!Form::open(array('url'=>'/admin/Provincia','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
        <div class="form-group">
            <label for="nombre">
                Nombre
            </label>
            <input class="form-control" name="nombre" placeholder="Nombre..." type="text">
            </input>
        </div>
        <div class="form-group">
            <label for="habilitado">
                Habilitado
            </label>
            <input class="form-control" name="habilitado" placeholder="Habilitado..." type="text">
            </input>
        </div>
        <div class="form-group">
            <label for="idresponsable">
                Responsable
            </label>
            <input class="form-control" name="idresponsable" placeholder="Responsable..." type="text">
            </input>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                Guardar
            </button>
            <button class="btn btn-danger" type="reset">
                Cancelar
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
