@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
@include('admin.usuario.includes.modalDelete')
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="mdleditar" name="mdleditar" role="dialog">
</div>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-sort">
                                </i>
                                Listado de Usuarios
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <a href="{{URL::to('/crearUsuario')}}" padding-left="15px">
                                <button class="btn btn-xs btn-white btn-default btn-round">
                                    <i class="ace-icon fa fa-times red2">
                                    </i>
                                    Crear Usuario
                                </button>
                            </a>
                            <div class="nav-search" id="nav-search">
                                {!! Form::open(array('url'=>'/Usuario','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
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
                                    <table class="table table-bordered table-hover" id="simple-table">
                                        <thead>
                                            <th width="5%">
                                                Id
                                            </th>
                                            <th width="20%">
                                                Usuario
                                            </th>
                                            <th width="20%">
                                                Email
                                            </th>
                                            <th width="10%">
                                                Estado
                                            </th>
                                            <th width="20%">
                                                Tipo
                                            </th>
                                            <th width="25%">
                                                Acciones
                                            </th>
                                        </thead>
                                        @if (count($usuarios)>0)
                                        <tbody>
                                            @foreach ($usuarios as $usu)
                                            <tr>
                                                <td>
                                                    {{$usu->id}}
                                                </td>
                                                <td>
                                                    {{$usu->name}}
                                                </td>
                                                <td>
                                                    {{$usu->email}}
                                                </td>
                                                <td>
                                                    @if ($usu->status == 0)
                                                    <span class="label label-sm label-danger">
                                                        Inactivo
                                                    </span>
                                                    @else
                                                    <span class="label label-sm label-success">
                                                        Activo
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$usu->stringRol->nombre}}
                                                </td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs btn-group">
                                                        <button class="btn btn-sm btn-success">
                                                            <a href="{{URL::to('/Usuario/'.$usu->id.'/edit')}}">
                                                                <i class="ace-icon fa fa-pencil bigger-120">
                                                                </i>
                                                            </a>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="ace-icon delete-modal fa fa-trash bigger-120" color="#00c0ef" data-id="{{$usu->id}}" data-placement="right" data-toggle="tooltip" title="Eliminar Usuario">
                                                            </i>
                                                        </button>
                                                        <button class="btn btn-sm btn-warning">
                                                            <a data-placement="right" data-toggle="tooltip" href="{{URL::action('UsuarioController@IniciarSesion',$usu->id)}}" title="Iniciar sesion como ... {{$usu->name}}">
                                                                <i class="ace-icon fa fa-calendar bigger-120">
                                                                </i>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @else
                                        <tbody>
                                            <tr>
                                                <td align="center" colspan="6">
                                                    <b>
                                                        No hay resultados en la búsqueda
                                                    </b>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endif
                                    </table>
                                    {{$usuarios->links()}}
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
    $('#searchText').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url  : '{{URL::to('/searchUsuario')}}',
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
        getUsuarios(page,$('#searchText').val());
    })
        $(document).on('click', '.editUsuario', function(){
            var url="{{URL::to('/EditarUser')}}";
            var id=$(this).data('id');
            $.ajax({
                type:'post',
                url: url,
                data: {         
                    'id': id
                },
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    $('#mdleditar').html(data);
                    $('#mdleditar').modal('show');
                }

            }).fail(function(data){

                            })
        })
    function getUsuarios(page,search)
    {
        var url="{{URL::to('/searchUsuario')}}";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
            data : {'searchText': search}
        }).done(function(data){
            $('#cuerpo').html(data);
        })
    }



        $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });            
            $('.modal').appendTo("body");
            MostrarMensaje();

        });
        $(document).on('click', '.delete-modal', function(){
            $('.id').text($(this).data('id'));
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="{{URL::to('/eliminarUsuario')}}";
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
            getUsuarios(1,"");
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
@endsection
