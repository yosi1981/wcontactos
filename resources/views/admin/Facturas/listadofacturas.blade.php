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
                                TODAS LAS FACTURAS DEL SISTEMA
                            </h5>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Usuario
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            Importe
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </thead>
                                    <tbody>
                                        @if($facturas)
                @foreach($facturas as $factura)
                                        <tr>
                                            <td>
                                                {{$factura->idfactura}}
                                            </td>
                                            <td>
                                                {{$factura->idusuario}}
                                            </td>
                                            <td>
                                                <?php $factura->
                                                fechafactura = date("d/m/Y", strtotime($factura->fechafactura));?>
                            {{$factura->fechafactura}}
                                            </td>
                                            <td>
                                                {{$factura->importefactura}}
                                            </td>
                                            <td>
                                                @if ($factura->pagada == 0)
                                                <span class="label label-sm label-danger">
                                                    Pdte. de pago
                                                </span>
                                                @else
                                                <span class="label label-sm label-success">
                                                    Pagada
                                                </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{URL::to('admin/VerFactura',$factura->idfactura)}}">
                                                    <i class="menu-icon fa fa-file-pdf-o" style="font-size:24px;color:red">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                    @else
                                        <tr>
                                            <td colspan="5">
                                                No hay facturas que mostrar.
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
