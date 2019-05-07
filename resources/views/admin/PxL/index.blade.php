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
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Pagos por lotes
                            </h5>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
                                    <div class="table-responsive">
                                        <table "="" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th width="5%">
                                                    Id
                                                </th>
                                                <th width="35%">
                                                    batch_id
                                                </th>
                                                <th width="5%">
                                                    Cargado
                                                </th>
                                                <th width="25%">
                                                    Cobrado
                                                </th>
                                                <th width="30%">
                                                    Estado
                                                </th>
                                            </thead>
                                            @if (count($pxls)>0)
                                            <tbody>
                                                @foreach ($pxls as $pxl)
                                                <tr>
                                                    <td>
                                                        {{$pxl->idpagosporlotes}}
                                                    </td>
                                                    <td>
                                                        {{$pxl->payout_batch_id}}
                                                    </td>
                                                    <td>
                                                        {{$pxl->importecargado}}
                                                    </td>
                                                    <td>
                                                        {{$pxl->importecobrado}}
                                                    </td>
                                                    <td>
                                                        {{$pxl->estado}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @else
                                            <tbody>
                                                <tr>
                                                    <td align="center" colspan="5">
                                                        <b>
                                                            No hay resultados en la búsqueda
                                                        </b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>