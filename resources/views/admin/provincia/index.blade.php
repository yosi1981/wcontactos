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
            @include('admin.provincia.nuevaProvincia.nuevaProvincia')
    @include('admin.provincia.nuevaProvincia.modal')
            <!--@include('admin.provincia.includes.search')-->
            <div class="row">
                <div class="col-xs-12">
                    <div  class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Prueba de Provincias
                            </h5>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <button class="btn btn-xs btn-white btn-default btn-round" id="btnAddProvincia" name="btnAddProvincia">
                                <i class="ace-icon fa fa-times red2">
                                </i>
                                Crear Provincia
                            </button>
                            <div class="nav-search" id="nav-search">
                                {!! Form::open(array('url'=>'/admin/Provincia','method'=>'GET','autocomplete'=>'off','class'=>'navbar-form navbar-left','role'=>'search')) !!}
                                <span class="input-icon">
                                    <input autocomplete="off" class="nav-search-input" id="searchText" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
                                        <i class="ace-icon fa fa-search nav-search-icon">
                                        </i>
                                    </input>
                                </span>
                                {{Form::close()}}
                            </div>
                            <!-- /.nav-search -->
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table  class="table table-striped table-bordered table-condensed table-hover">
                                                <thead>
                                                    <th width="5%">
                                                        Id
                                                    </th>
                                                    <th width="35%">
                                                        Nombre
                                                    </th>
                                                    <th width="5%">
                                                        Habilitado
                                                    </th>
                                                    <th width="25%">
                                                        Responsable
                                                    </th>
                                                    <th width="30%">
                                                        Opciones
                                                    </th>
                                                </thead>
                                                @if (count($provincias)>0)
                                                <tbody>
                                                    @foreach ($provincias as $provi)
                                                    <tr>
                                                        <td>
                                                            {{$provi->idprovincia}}
                                                        </td>
                                                        <td>
                                                            {{$provi->nombre}}
                                                        </td>
                                                        <td>
                                                            {{$provi->habilitado}}
                                                        </td>
                                                        <td>
                                                            <a href="{{URL::to('/Usuario/'.$provi->idresponsable.'/edit')}}">
                                                                {{$provi->NombreUsuario}}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-success">
                                                                <a href="{{URL::action('ProvinciaController@edit',$provi->idprovincia)}}">
                                                                    <i class="ace-icon fa fa-pencil bigger-120">
                                                                    </i>
                                                                </a>
                                                            </button>
                                                            @if ($provi->habilitado==1)
                                                            <button class="delete-modal btn btn-sm btn-danger" data-id="{{$provi->idprovincia}}">
                                                                DESHABILITAR
                                                            </button>
                                                            @else
                                                            <button class="delete-modal btn btn-sm btn-success" data-id="{{$provi->idprovincia}}">
                                                                HABILITAR
                                                            </button>
                                                            @endif
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
                                            {{$provincias->links()}}
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
    });
    $('#searchText').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url  : '{{URL::to('/admin/searchProvincia')}}',
            data : {'searchText' : $value},
            async: true,
            dataType: 'json',
            headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                 },
            success:function(data){
                $('#cuerpo').html(data);
            }
        })
    })
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        getProvincias(page,$('#searchText').val());
    })

    function getProvincias(page,search)
    {
        var url="{{URL::to('/admin/searchProvincia')}}";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
            data : {'searchText': search}
        }).done(function(data){
            $('#cuerpo').html(data);
        })
    }
    function MostrarMensaje()
    {
            $.bootstrapGrowl("{{ \Session::get('seccion_actual') }}", {
              ele: 'body', // which element to append to
              type: 'info', // (null, 'info', 'danger', 'success')
              offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
              align: 'right', // ('left', 'right', or 'center')
              width: 250, // (integer, or 'auto')
              delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
              allow_dismiss: true, // If true then will display a cross to close the popup.
              stackup_spacing: 10 // spacing between consecutively stacked growls.
            });
    }

        $('#btnAddProvincia').on('click',function(){

            $('.texto1').val('');
            $('#Provincia').modal('show');
        })

        $('#frmProvincia').on('submit',function(e){
            e.preventDefault();
            var form=$('#frmProvincia');
            var formData=form.serialize();
            var url=form.attr('action');
            $.ajax({
                type:'post',
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    $('#Provincia').modal('hide');
                    getProvincias(1,"");
                    MostrarMensaje();
                }

            }).fail(function(data){

                            })
        });
        $(document).ready(function() {
            $('.modal').appendTo("body");
            MostrarMensaje();

        });

        $(document).on('click', '.delete-modal', function(){
            $('.id').text($(this).data('id'));
            var ask=$(this).text();
            if(ask.trim() == "HABILITAR")
            {
                $('.modal-title').text("DESHABILITAR");                
                $('.texto').text("¿Desea Deshabilitar la Provincia?");
            }
            else
            {
                $('.modal-title').text("HABILITAR");                
                $('.texto').text("¿Desea Habilitar la Provincia?");
            }
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="{{URL::to('/admin/eliminarProvincia')}}";
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
            getProvincias(1,"");
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
@endsection
