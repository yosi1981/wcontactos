@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.barraizda')
@endsection
@section ('contenido')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="page-header">
            </div>
            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                <div class="widget-header widget-header-small">
                    <h6 class="widget-title">
                        <i class="ace-icon fa fa-sort">
                        </i>
                        Información de las Promociones Activas
                    </h6>
                    <div class="widget-toolbar">
                        <a data-action="search" href="#">
                            <i class="ace-icon fa fa-search">
                            </i>
                        </a>
                        <a data-action="reload" href="#">
                            <i class="ace-icon fa fa-refresh">
                            </i>
                        </a>
                        <a data-action="collapse" href="#">
                            <i class="ace-icon fa fa-minus" data-icon-hide="fa-minus" data-icon-show="fa-plus">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="widget-body" style="display: block;">
                    <div class="widget-main">
                        <table class="table table-bordered table-hover" id="simple-table">
                            <thead>
                                <th>
                                    Id
                                </th>
                                <th class="detail-col">
                                    Descripcion
                                </th>
                                <th>
                                    Dias
                                </th>
                                <th>
                                    Importe
                                </th>
                                <th>
                                    Fecha Inicio
                                </th>
                                <th>
                                    Fecha Final
                                </th>
                                <th>
                                    Estado
                                </th>
                            </thead>
                            <tbody>
                                @if(count($promociones)>0)
{{ Form::open(array('url' => '/payment','method'=>'GET'), array('role' => 'form')) }}
                @foreach($promociones as $promocion)
                                <tr>
                                    <td>
                                        {{ Form::radio('pro[]', $promocion->id) }}
                                    </td>
                                    <td>
                                        {{$promocion->descripcion}}
                                    </td>
                                    <td>
                                        {{$promocion->dias}}
                                    </td>
                                    <td>
                                        {{$promocion->importe}}
                                    </td>
                                    <td>
                                        {{$promocion->fecha_inicio}}
                                    </td>
                                    <td>
                                        {{$promocion->fecha_fin}}
                                    </td>
                                    <td>
                                        {{$promocion->status}}
                                    </td>
                                </tr>
                                @endforeach
                        @else
                                <tr>
                                    <td colspan="7">
                                        NO hay ninguna promocion que mostrar
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ Form::button('Realizar pago', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}

@include('anunciante.includes.tablapagos')
        </div>
    </div>
</div>
@endsection
