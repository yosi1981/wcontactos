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
<div class="map" id="map">
    <div>
        <svg version="1.1" viewbox="200 -100 600 600" xmlns="http://www.w3.org/2000/svg" xmlns:amcharts="http://amcharts.com/ammap" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g>
                @foreach($provincias as $tprovincia)
       @if ($tprovincia->habilitado==1)
                <path class="map__image imgprovincia" d="{{$tprovincia->coordenadas}}" data-id="{{$tprovincia->idprovincia}}" id="{{$tprovincia->idprovincia}}" title="{{$tprovincia->nombre}}">
                </path>
                @else
                <path class="map__image1 " d="{{$tprovincia->coordenadas}}" data-id="{{$tprovincia->idprovincia}}" id="{{$tprovincia->idprovincia}}" title="{{$tprovincia->nombre}}">
                </path>
                @endif
    @endforeach
            </g>
        </svg>
    </div>
</div>
<style>
    .map__image{
        width:20%;
        float: left;
    }
    .map__image{
        fill:#d4847f;
        width:20%;
        stroke:#FFF;
        stroke-width: 0.5px;
        border-bottom: 1px #da9591 solid;
    }
    .map__image:hover{
        fill:#b5597c;
        width:20%;
        stroke:#fff;
        stroke-width: 1.5px;

    }
    .map__image1{
        fill:#2a0a0d;
        width:20%;
        stroke:#FFF;
        stroke-width: 0.5px;
    }
</style>
<script>
    $(document).on('click','.imgprovincia',function(e){
        e.preventDefault();
        var url="{{URL::to('/mostrar/')}}"+"/"+$(this).data('id');
        window.location.href = url;
    })
</script>
@endsection
