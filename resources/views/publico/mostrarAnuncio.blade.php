
@extends ('layouts.main')

@section ('barraizquierda')

@if (count($provincias)>0)
        @foreach ($provincias as $pro)

            <li><a href="{{URL::action('PrincipalController@mostrarAnuncios',$pro->idprovincia)}}">{{$pro->nombre}}</a>
            <i class="fa fa-2x fa-angle-left pull-right"></i></li>

        @endforeach
@endif
@endsection

@section ('contenido')



<h1>Mostrar Anuncio</h1>

  <div class="row">
  <p>{{$anuncio->titulo}}</p>
 <div class="row">
  <p>{{$anuncio->descripcion}}</p>
    <div class="form-group col-md-4">

  @foreach($anuncio->ImagenesAnuncio as $imagen)
        <a href="/imagenes/thumb_{{$imagen->ficheroimagen}}" data-lightbox="mygallery"><img src="/imagenes/thumb_{{$imagen->ficheroimagen}}"></a>
  @endforeach
    </div>
  </div>




@endsection
