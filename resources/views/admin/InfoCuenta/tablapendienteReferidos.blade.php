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
            <div class="row">
                <div class="col-xs-12">
                    @if(session()->has('msj'))
                    <div class="alert alert-success">
                        <button aria-hidden="true" class="close" type="button">
                            ×
                        </button>
                        <span>
                            <b>
                                Exito -
                            </b>
                            {{ session('msj')}} ".alert-success"
                        </span>
                    </div>
                    @endif
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Pendiente de cobrar (REFERIDOS)
                            </h5>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>
                                            Fecha
                                        </th>
                                        <th class="detail-col">
                                            Detalles
                                        </th>
                                        <th>
                                            Anuncios
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </thead>
                                    <tbody>
                                        @if($pdtRef["contenido"])
                @foreach($pdtRef["contenido"] as $fecha)
                                        <tr>
                                            <td>
                                                {{$fecha["fecha"]}}
                                            </td>
                                            <td class="center">
                                                <div class="action-buttons">
                                                    <a class="green bigger-140 show-details-btn" href="#" title="Show Details">
                                                        <i class="ace-icon fa fa-angle-double-down">
                                                        </i>
                                                        <span class="sr-only">
                                                            Details
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                {{$fecha["NumAnuncios"]}}
                                            </td>
                                            <td>
                                                {{$fecha["totalganadodia"]}}
                                            </td>
                                        </tr>
                                        <tr class="detail-row">
                                            <td colspan="8">
                                                <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                                    <div class="widget-header widget-header-small">
                                                        <h6 class="widget-title">
                                                            <i class="ace-icon fa fa-sort">
                                                            </i>
                                                            Detalle de {{$fecha["fecha"]}}
                                                        </h6>
                                                        <div class="widget-toolbar">
                                                            <a data-action="search" href="#">
                                                                <i class="ace-icon fa fa-search" font-color="white">
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
                                                                    <tr>
                                                                        <th>
                                                                            Referido
                                                                        </th>
                                                                        <th>
                                                                            Anuncios
                                                                        </th>
                                                                        <th>
                                                                            Total
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if($fecha["referidos"])

                                                @foreach ($fecha["referidos"] as $referido)
                                                                    <tr>
                                                                        <td>
                                                                            {{$referido["referido"]["name"]}}
                                                                        </td>
                                                                        <td>
                                                                            {{$referido["NumAnuncios"]}}
                                                                        </td>
                                                                        <td>
                                                                            {{$referido["totaldiareferido"]}}
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                        @else
                                                                    <tr>
                                                                        <td colspan="4">
                                                                            No hay anuncios publicados en esta fecha
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                    @else
                                        <tr>
                                            <td colspan="4">
                                                No tienes ganancias generadas de referidos.
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
