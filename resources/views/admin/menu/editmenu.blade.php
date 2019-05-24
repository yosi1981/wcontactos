@extends ('layouts.admin2')
@section ('barraizda')

                                        {{ Form::label('Menu', 'Tmenu') }}
        {!! Form::select('idmenu',$tmenu,$tmenudef, $attributes = array('class'=>'form-control','id'=>'idmenu','data-id'=>$tmenudef)) !!}
<div id=cuerpomenu>
      
</div>
@endsection
@section ('contenido')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs" >
        </div>
        <div class="page-content">
            <div class="row" >
                <div class="col-xs-12" id="cuerpo">
 
                </div>
            </div>
        </div>
    </div>
</div>
<style>
#widget-box-3{
  box-shadow: 1px 1px 20px #000;
}
</style>
<script type="text/javascript">
                               $(document).on('change','#imagen',function(e){
                                    imgsel="fa "+$('#imagen option:selected').text();
                                    $('#iconoseleccionado').removeClass().addClass(imgsel);
                                });

        $(document).ready(function() {
            MostrarMenu();
            
        });
    $('#idmenu').change(function(event) {
            event.preventDefault();
      $('#cuerpo').html("");    
      MostrarMenu();
          });

    $(document).on('click','.actualizar ',function(e){
        e.preventDefault();
        idmenu=$('#idmenu').val();
        idmenuitem=$(this).data('idmenuitem');
            var url="{{URL::to('/admin/newmenuitem')}}"+"/"+idmenu+"/"+idmenuitem;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                            MostrarMenu();
                    $('#cuerpo').html(data);
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
                }

            }).fail(function(data){

                            });

    });


    $(document).on('click','.editar ',function(e){
        e.preventDefault();
        idmenuitem=$(this).data('idmenuitem');
            var url="{{URL::to('/admin/editmenuitem')}}"+"/"+idmenuitem;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    $('#cuerpo').html(data);
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
        MostrarMenu();
                }

            }).fail(function(data){

                            });

    });
    $(document).on('click','.subir ',function(e){
        e.preventDefault();
        idmenuitem=$(this).data('idmenuitem');
            var url="{{URL::to('/admin/subiritem')}}"+"/"+idmenuitem;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    MostrarMenu();
                    $('#cuerpo').html("");
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

    });
    $(document).on('click','.bajar ',function(e){
        e.preventDefault();
        idmenuitem=$(this).data('idmenuitem');
            var url="{{URL::to('/admin/bajaritem')}}"+"/"+idmenuitem;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    MostrarMenu();
                    $('#cuerpo').html("");
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

    });
    $(document).on('click','.eliminar ',function(e){
        e.preventDefault();
        idmenuitem=$(this).data('idmenuitem');
            var url="{{URL::to('/admin/eliminarmenuitem')}}"+"/"+idmenuitem;
            alert(url);
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    MostrarMenu();
                    $('#cuerpo').html("");
         TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

    });
 
    function MostrarMenu(){
            idmenu=$('#idmenu').val();
            var url="{{URL::to('/admin/showmenu')}}"+"/"+idmenu+"/"+true;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    $('#cuerpomenu').html(data);
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

    }

</script>
@endsection
