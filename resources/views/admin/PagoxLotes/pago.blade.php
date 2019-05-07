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
                                Facturas Pendientes de Pago
                            </h5>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <form id="facturasAPagar" method="POST" name="facturasAPagar">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <th width="5%">
                                                <div align="center" class="checkbox">
                                                    <label>
                                                        <input name="todUsu" type="checkbox" value=""/>
                                                    </label>
                                                </div>
                                            </th>
                                            <th>
                                                Factura
                                            </th>
                                            <th>
                                                Importe a Facturar
                                            </th>
                                        </thead>
                                        <tbody>
                                            @if($facturas)
                @foreach($facturas as $factura)
                                            <tr>
                                                <td>
                                                    <div align="center" class="checkbox">
                                                        <label>
                                                            <input name="selUsu[]" type="checkbox" value="{{$factura->idfactura}}"/>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$factura->idusuario}}
                                                </td>
                                                <td>
                                                    {{$factura->importefactura}}
                                                </td>
                                            </tr>
                                            @endforeach
                    @else
                                            <tr>
                                                <td colspan="5">
                                                    No hay pendiente de facturar.
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </form>
                                <button class="PagarFactus btn btn-sm btn-success">
                                    <i class="ace-icon fa fa-pencil bigger-120">
                                    </i>
                                    Pagar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function PagarFacturas()
    {
        var url="{{URL::to('/admin/PxL/')}}";
            var form=$('#facturasAPagar');
            var formData=form.serialize();
        $.ajax({
                type:'post',
                url: url,
                data: formData,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   }
        }).done(function(data){

        })
    }
    $(document).on('click','.PagarFactus',function(e){
        e.preventDefault();
         PagarFacturas();
    })
</script>
@endsection
