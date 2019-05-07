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
                    @include('admin.anuncio.includes.modalDelete')

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
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Anuncios
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <a href="{{URL::to('/crearAnuncio')}}" padding-left="15px">
                                <button class="btn btn-xs btn-white btn-default btn-round">
                                    <i class="ace-icon fa fa-times red2">
                                    </i>
                                    Crear Anuncio
                                </button>
                            </a>
                            <div class="nav-search" id="nav-search">
                                {!! Form::open(array('url'=>'Anuncio','method'=>'GET','class'=>'form-search','autocomplete'=>'off','role'=>'search')) !!}
                                <span class="input-icon">
                                    <input autocomplete="off" class="nav-search-input" id="searchText" name="searchText" placeholder="Search ..." type="text">
                                        <i class="ace-icon fa fa-search nav-search-icon">
                                        </i>
                                    </input>
                                </span>
                                {{Form::close()}}
                            </div>
                            <!-- /.nav-search -->
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main ">
                                <div>
                                </div>
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
                                    <table class="table table-bordered table-hover" id="simple-table">
                                        <thead>
                                            <tr>
                                                <th width="5%">
                                                    Id
                                                </th>
                                                <th width="10%">
                                                    Titulo
                                                </th>
                                                <th width="10%">
                                                    Estado
                                                </th>
                                                <th width="30%">
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        @if (count($anuncios)>0)
                                        <tbody>
                                            @foreach ($anuncios as $anu)
                                            <tr>
                                                <td>
                                                    {{$anu->idanuncio}}
                                                </td>
                                                <td>
                                                    {{$anu->titulo}}
                                                </td>
                                                <td class="hidden-480">
                                                    @if ($anu->activo == 0)
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
                                                    <div class="hidden-sm hidden-xs btn-group">
                                                        <button class="btn btn-sm btn-success">
                                                            <a href="{{URL::to('/Anuncio/'.$anu->idanuncio.'/edit')}}">
                                                                <i class="ace-icon fa fa-pencil bigger-120">
                                                                </i>
                                                            </a>
                                                        </button>
                                                        @if ($anu->activo == 0)
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="ace-icon delete-modal fa fa-trash bigger-120" color="white" data-id="{{$anu->idanuncio}}">
                                                            </i>
                                                        </button>
                                                        @endif
                        @if ($anu->activo == 1)
                                                        <button class="btn btn-sm btn-warning">
                                                            <a href="{{URL::to('/listadoCitas/'.$anu->idanuncio)}}">
                                                                <i class="ace-icon fa fa-calendar bigger-120">
                                                                </i>
                                                            </a>
                                                        </button>
                                                        @endif
                                                        <button class="btn btn-sm btn-warning">
                                                            <a href="{{URL::to('/anunciante/createAP/'.$anu->idanuncio)}}">
                                                                <i class="ace-icon fa fa-calendar bigger-120">
                                                                </i>
                                                            </a>
                                                        </button>
                                                    </div>
                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-position="auto" data-toggle="dropdown">
                                                                <i class="ace-icon fa fa-cog icon-only bigger-110">
                                                                </i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a class="tooltip-info" data-original-title="View" data-rel="tooltip" href="#" title="">
                                                                        <span class="blue">
                                                                            <i class="ace-icon fa fa-search-plus bigger-120">
                                                                            </i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="tooltip-success" data-original-title="Edit" data-rel="tooltip" href="#" title="">
                                                                        <span class="green">
                                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120">
                                                                            </i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="tooltip-error" data-original-title="Delete" data-rel="tooltip" href="#" title="">
                                                                        <span class="red">
                                                                            <i class="ace-icon fa fa-trash-o bigger-120">
                                                                            </i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @else
                                        <tbody>
                                            <tr>
                                                <td align="center" colspan="9">
                                                    <b>
                                                        No hay resultados en la búsqueda
                                                    </b>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endif
                                    </table>
                                    {{$anuncios->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#searchText').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url  : "{{URL::to('/searchAnuncio')}}",
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
        getAnuncios(page,$('#searchText').val());
    })

$(document).ready(function() {
        $('.modal').appendTo("body");

        });


    function getAnuncios(page,search)
    {
        var url="{{URL::to('/searchAnuncio')}}";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
            data : {'searchText': search}
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
            var url="{{URL::to('/eliminarAnuncio')}}";
            alert('eliminarAnuncio');
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
            getAnuncios(1,"");
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
@endsection
