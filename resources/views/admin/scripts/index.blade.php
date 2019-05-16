@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div  class="tableefecto widget-box widget-color-blue ui-sortable-handle " id="c1">
                        <div class="widget-header widget-header-small ">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Listado de Scripts ZONA PUBLICA
                            </h5>
                           
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <div class="table-responsive" id="cuerpo1" name="cuerpo1">
<div class="card">
    <div class="table-responsive">
        <table  class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th width="5%">
                    <div align="center">
                    </div>
                </th>
                <th width="5%" style="text-align: center">
                    Estado
                </th>
                <th>
                    Css
                </th>
                <th style="text-align: right">
                    Tamaño (kb)
                </th>
            </thead>
            @if (count($scripts)>0)
            <tbody>
                <form action="/admin/writefileincludescripts"  method="get">
                    @foreach ($scripts as $script)
                        @if($script["file_in_proyect"]==-1)
                            <tr style="color:red;font-weight: bold;">
                        @else
                            @if($script["file_in_proyect"]==1)
                                <tr style="font-weight: bold;">
                            @else
                                <tr>
                            @endif
                        @endif
                                <td align="center">
                                    @if($script["file_in_proyect"]>0)
                                    <input checked="CHECKED" id="selfile[]" name="selfile[]" type="checkbox" value="{{$script['stylefile']}}"/>
                                    @else
                                                                        @if($script["file_in_proyect"]==0)
                                    <input id="selfile[]" name="selfile[]" type="checkbox" value="{{$script['stylefile']}}"/>
                                    @endif
                                                                    @endif
                                </td>
                                <td align="center">
                                    @if($script["file_in_proyect"]>0)
                                    <i class="menu-icon fa fa-check" style="color:green">
                                    </i>
                                    @else
                                                                        @if($script["file_in_proyect"]==-1)
                                    <i class="menu-icon fa fa-times">
                                    </i>
                                    @endif
                                                                    @endif
                                </td>
                                <td>
                                    {{$script["stylefile"]}}
                                </td>
                                <td align="right">
                                    {{$script["stylefile_size"]}}
                                </td>

                            </tr>
                            @endforeach
                    <button class="btn btn-primary" type="submit">
                        Confirmar
                    </button>
                </form>
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
    </div>
</div>
<style>
.tableefecto{
  box-shadow: 1px 1px 20px #000;
}

</style>
<script>
        $(document).ready(function() {

            $("#c1").fadeIn();
            TweenMax.from("#c1", 0.4, { scale: 0, ease: Sine.easeInOut });
            TweenMax.to("#c1", 0.4, { scale: 1, ease: Sine.easeInOut });

        });

</script>
@endsection
