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
                    <div id=c1 class="widget-box widget-color-blue ui-sortable-handle " id="widget-box-3">
                        <div class="widget-header widget-header-small ">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Listado de Scripts <tabla>
                            </h5>
                            <div class="widget-toolbar">
            <a data-action="guardar" style="color:white;">
                <i class="ace-icon fa fa-floppy-o">
                </i>
            </a>

            <a data-action="reload" class="refrescar" data-ruta="1"  href="#">
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
                                <div class="table-responsive" id="cuerpo1" name="cuerpo1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>


</script>
@endsection
