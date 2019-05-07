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
 @include('admin.Promocion.includes.modal')            
            <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                <div class="widget-header widget-header-small">
                    <h6 class="widget-title">
                        <i class="ace-icon fa fa-sort">
                        </i>
                        Información de las Promociones
                    </h6>
                </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <button class="btn btn-xs btn-white btn-default btn-round" id="btnAddProvincia" name="btnAddProvincia">
                                <i class="ace-icon fa fa-times red2">
                                </i>
                                Crear Promocion
                            </button>
                        </div>
                <div class="widget-body" style="display: block;">
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
                                    <div class="card">
                                        <div class="table-responsive">
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
                                    Compras
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Opciones
                                </th>
                            </thead>
                            <tbody>
                                @if(count($promociones)>0)
                @foreach($promociones as $promocion)
                                <tr>
                                    <td>
                                        {{$promocion->id}}
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
                                        {{$promocion->numcompras}}
                                    </td>
                                    <td>
                                        {{$promocion->status}}
                                    </td>
                                    <td>
                                                            @if ($promocion->status==1)
                                                            <button class="delete-modal btn btn-sm btn-danger" data-id="{{$promocion->id}}">
                                                                DESHABILITAR
                                                            </button>
                                                            @else
                                                            <button class="delete-modal btn btn-sm btn-success" data-id="{{$promocion->id}}">
                                                                HABILITAR
                                                            </button>
                                                            @endif
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
                        {{$promociones->links()}}
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
    });

    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        getPromociones(page);
    })

    function getPromociones(page)
    {
        var url="{{URL::to('/admin/searchPromocion')}}";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
        }).done(function(data){
            $('#cuerpo').html(data);
        })
    }

        $(document).on('click', '.delete-modal', function(){
            $('.id').text($(this).data('id'));
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="{{URL::to('/admin/eliminarPromocion')}}";
          $.ajax({
            type: 'post',
            data: {
              'id': $('.id').text()
            },
            url: url,
            headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
            success: function(data) {
            $('#modal-delete').modal('hide');
            getPromociones(1);
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
@endsection
