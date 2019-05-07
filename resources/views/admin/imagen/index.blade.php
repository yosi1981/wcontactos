@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')

    @include('admin.imagen.includes.nuevaImagen')
    @include('admin.imagen.includes.modal-delete-img-user')
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
                                Imagenes de los anunciantes
                            </h6>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <table class="table table-bordered table-hover" id="simple-table">
                                    <thead>
                                        <th>
                                            Id
                                        </th>
                                        <th class="detail-col">
                                            Detalles
                                        </th>
                                        <th>
                                            Usuario
                                        </th>
                                        <th>
                                            Imagenes
                                        </th>
                                    </thead>
                                    <tbody>
                                        @if(count($usuarios)>0)
                @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>
                                                {{$usuario->id}}
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
                                                {{$usuario->Usuario->email}}
                                            </td>
                                            <td id="imgusuario{{$usuario->id}}">
                                                {{count($usuario->Imagenes)}}
                                            </td>
                                        </tr>
                                        <tr class="detail-row">
                                            <td colspan="8">
                                                <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                                    <div class="widget-header widget-header-small">
                                                        <h6 class="widget-title">
                                                            <i class="ace-icon fa fa-sort">
                                                            </i>
                                                            Imágenes de {{$usuario->Usuario->email}}
                                                        </h6>
                                                        <div class="widget-toolbar">
                                                            <a data-action="search" href="#">
                                                                <i class="ace-icon fa fa-search">
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
                                                        <div class="widget-main" id="det{{$usuario->id}}">
                                                            <ul class="ace-thumbnails clearfix">
                                                                @foreach($usuario->Imagenes as $imagen)
                                                                <li>
                                                                    <a class="cboxElement" data-rel="colorbox" href="" title="{{$imagen->titulo}}">
                                                                        <img alt="{{$imagen->idusuario}}" class="desaturada" height="200" src="/imagenes/thumb_{{$imagen->ficheroimagen}}" width="150">
                                                                        </img>
                                                                    </a>
                                                                    <!--
                                                <div class="tags">
                                                    <span class="label-holder">
                                                        <span class="label label-info">
                                                            breakfast
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-danger">
                                                            fruits
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-success">
                                                            toast
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-warning arrowed-in">
                                                            diet
                                                        </span>
                                                    </span>
                                                </div>
                                            -->
                                                                    <div class="tools">
                                                                        <a href="#">
                                                                            <i class="ace-icon fa fa-link">
                                                                            </i>
                                                                        </a>
                                                                        <a href="#">
                                                                            <i class="ace-icon fa fa-paperclip">
                                                                            </i>
                                                                        </a>
                                                                        <a href="#">
                                                                            <i class="ace-icon delete-modal-img-user fa fa-times red" data-id="{{$imagen->idimagen}}" data-titulo="{{$imagen->titulo}}" data-userid="{{$imagen->idusuario}}">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                <div class="nimagen">
                                                                    <a data-iduserimagen="{{$usuario->id}}" href="" title="Añadir imagenes">
                                                                        <img height="200" src="/imagenes/thumb_descarga.jpeg" width="150">
                                                                        </img>
                                                                    </a>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                        @else
                                        <tr>
                                            <td colspan="4">
                                                NO TIENES NINGUN REFERIDO
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.page-content -->
</div>
<style>
.tableefecto{
  box-shadow: 1px 1px 20px #000;
}
</style>
<script type="text/javascript">
    $(document).ready(function(){
                $("#widget-box-3").fadeIn();
                TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
                TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
                $('[data-toggle="tooltip"]').tooltip();
                //getImagenes();
            });
            $('#btnUploadImagen').on('click',function(){
                $('#Imagen').modal('show');
            })
                       $(document).on('click', '.nimagen a', function(e){
                            e.preventDefault();
                            var id=$(this).data('iduserimagen');
                            $('.iduserimagen').val(id);
                            $('#Imagen').modal('show');
                })


            var form=document.getElementById('frmUploadImage');
            var request=new XMLHttpRequest();

           request.upload.addEventListener('progress',function(e){
                e.preventDefault();
                console.log((e.loaded/e.total*100)+'porcentaje');
            },false);



            form.addEventListener('submit',function(e){
                e.preventDefault();
                var formData=new FormData(form);

                request.open('post','uploadimage');

                request.send(formData);
                request.addEventListener("load",transferComplete);
            })
        function getImagenesUser(id)
    {
        var url="{{URL::to('/admin/getImagesUser')}}";
        $.ajax({
            type : 'get',
            url  : url,
            data :{
                'id':$('.iduserimagen').val()
            },
            //data : {'searchText': search}
        }).done(function(data){
            var cuerpo= "det"+id;
            $('#'+cuerpo).html(data);
            var images=$("#det"+id+" li").size();
            $('#imgusuario'+id).text(images);
        })
    }
            function transferComplete(data){
                var id=$('.iduserimagen').val();
                $('#Imagen').modal('hide');
                getImagenesUser(id);
            }
            $(document).ready(function() {
                $('.modal').appendTo("body");
            });
                $('.modal-footer1').on('click', '.delete1', function(e) {
                    e.preventDefault();
                    var url="{{URL::to('/admin/eliminarimagen')}}";
                    var id=$('.id').val();
                    var iduser=$('.iduserimagen').val();
                  $.ajax({
                    type: 'post',
                    data: {
                      'id': id
                    },
                    url: url,
                    headers: {
                               'X-CSRF-TOKEN': '{{ csrf_token() }}',
                           },
                    success: function(data) {
                    $('#modal-delete-img-user').modal('hide');
                    getImagenesUser(iduser);
                    //$('#imgusuario'+id).text($('#imgusuario'+id).text()-1);
                    }
                  });
                });

                        $(document).on('click', '.delete-modal-img-user', function(){
                            var id=$(this).data('id');
                            var iduser=$(this).data('userid');
                            var titulo=$(this).data('titulo');
                            $('.id').val(id);
                            $('.iduserimagen').val(iduser);
                            $('#titledelete').text("Desea eliminar la imagen: ".concat(titulo));
                            $('#modal-delete-img-user').modal('show');
                })
</script>
<style>
    img.desaturada { filter: grayscale(100%);
-webkit-filter: grayscale(100%);
-moz-filter: grayscale(100%);
-ms-filter: grayscale(100%);
-o-filter: grayscale(100%);
}
</style>
@endsection
