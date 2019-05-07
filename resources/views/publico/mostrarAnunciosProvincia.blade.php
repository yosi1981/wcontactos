@extends ('layouts.main')

@section ('barraizquierda')
@if (count($provincias)>0)
        @foreach ($provincias as $pro)
<li>
    <a href="{{URL::action('PrincipalController@mostrarAnuncios',$pro->idprovincia)}}">
        {{$pro->nombre}}
    </a>
    <i class="fa fa-2x fa-angle-left pull-right">
    </i>
</li>
@endforeach
@endif
@endsection

@section ('contenido')
<div id="footer1">
    <p>
        {{$provincia->nombre}}
    </p>
</div>
@if (count($anuncios)>0)
    @foreach ($anuncios as $anu)
<div class="tarjeta-wrap">
    <div class="tarjeta">
        <div class="adelante " style="  background-image: url('{{asset('imagenes/thumb_'.$anu->imagen)}}');
    background-size: cover;">
            <p>
                {{$anu->titulo}}
            </p>
        </div>
        <div class="atras">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ex velit beatae. Illum, suscipit, aspernatur!
            </p>
        </div>
    </div>
</div>
@endforeach
@else
<div class="product_box">
    <img alt="" class="prod_image" src="{{asset('img/p1.gif')}}" title=""/>
    <div class="product_details">
        <div class="prod_title">
            xxxxxx
        </div>
        <p>
            xxxxxx
        </p>
        <p class="price">
            <span class="price">
                xxxxx
            </span>
        </p>
        <a class="details" href="details.html">
            <img alt="" border="0" src="{{asset('img/details.gif')}}" title=""/>
        </a>
    </div>
</div>
@endif

@endsection
