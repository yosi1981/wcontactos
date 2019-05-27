
@if (count($menu)>0)
		<div class="menu ">
			<ol class="menu-list">
					<?php $i=0;
					$total=count($menu);
					?>
					@foreach ($menu as $menuitem)
						<?php $i+=1; 
						?>
						<li class="menu-item menu2-item" >
							<div class="menu-handle menu2-handle" >
								<i class="normal-icon ace-icon fa {{$menuitem['imagen']}} gree bigger-130 sombra" style="color:{{$menuitem['color']}}"></i>
							</div>
							<div class="menu2-content">
							@if($menuitem["items"])
								<?php
									$seccion = \Session::get('seccion_actual');
									if (in_array($seccion, $menuitem["seccion"]) == true) 
									{
								?>
									<i style="position:relative;left:-5px;" class="plus  fa fa-minus sombra "  aria-hidden="true" ></i>
								<?php
								}
								else
								{
								?>
									<i style="position:relative;left:-5px;" class="plus  fa fa-plus sombra  "  aria-hidden="true" style="text-shadow: 1px 2px 3px #696;"></i>
								<?php
								}
								?>
							@endif
							{{$menuitem["Titulo"]}}
								<div class="opciones">
								@if($i>1)
								<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="subir  fa fa-arrow-up gree  bigger-130 sombra" aria-hidden="true"></i>
								@else
								<i  class="subird  fa fa-arrow-up   bigger-130 sombra" aria-hidden="true"></i>								
								@endif
								@if($i<>$total)
								<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="bajar  fa fa-arrow-down gree bigger-130 sombra" aria-hidden="true"></i>		
								@else
								<i  class="bajard fa fa-arrow-down  bigger-130 sombra " aria-hidden="true"></i>										
								@endif
								<i data-idmenu="{{$menuitem['idmenu']}}" data-idmenuitem="{{$menuitem['idmenuitem']}}" class="actualizar crear  fa fa-folder  bigger-130 sombra" aria-hidden="true"></i>
								<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="editar edicion  fa fa-pencil  bigger-130 sombra" aria-hidden="true"></i>
								<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="eliminar papelera fa fa-trash  bigger-130 sombra" aria-hidden="true"></i>
								</div>
							</div>
							@if($menuitem["items"])
								@include('pruebas.menumultinivel.partial')
							@endif
						</li>
					@endforeach
						<li class="menu-item menu2-item" >
							<div class="menu-handle menu2-handle" >
								<i class="normal-icon ace-icon fa fa-folder-open carpeta bigger-130 sombra"></i>
							</div>
							<div class="menu2-content">
							Añadir item
							<div class="opciones">
								<i data-idmenu="{{$menuitem['idmenu']}}" data-idmenuitem="{{$menuitem['idmenuitem_padre']}}" class="actualizar crear  fa fa-folder  bigger-130 sombra" aria-hidden="true"></i>
							</div>
							</div>
						</li>
						<li class="menu-item menu2-item" >
							<a class="speciala" href="/admin/SaveToFile/{{$idmenu}}">
								<div class="menu-handle menu2-handle" >
									<i class="normal-icon ace-icon fa fa-save  bigger-130 sombra" ></i>
								</div>
								<div class="menu2-content">
								Guardar cambios
								</div>
							</a>
						</li>
						<li class="menu-item menu2-item" >
							<a class="speciala" href="/admin/dashboard">
								<div class="menu-handle menu2-handle" >
									<i class="normal-icon ace-icon fa fa-reply  bigger-130 sombra" ></i>
								</div>
								<div class="menu2-content">
								Volver al Dashboard
								</div>
							</a>
						</li>
			</ol>
		</div>
@else
		<div class="menu ">
			<ol class="menu-list">
						<li class="menu-item menu2-item" >
							<div class="menu-handle menu2-handle" >
								<i class="normal-icon ace-icon fa fa-folder-open carpeta bigger-130 sombra"></i>
							</div>
							<div class="menu2-content">
							Añadir item
								<div class="opciones">
								<i data-idmenu="{{$idmenu}}" data-idmenuitem="0" class="actualizar crear  fa fa-folder  bigger-130 sombra" aria-hidden="true"></i>
								</div>
							</div>
						</li>
						<li class="menu-item menu2-item" >
							<a class="speciala" href="">
								<div class="menu-handle menu2-handle" >
									<i class="normal-icon ace-icon fa fa-save  bigger-130 sombra"></i>
								</div>
								<div class="menu2-content">
								Guardar cambios
								</div>
							</a>
						</li>
						<li class="menu-item menu2-item" >
							<a class="speciala" href="/admin/dashboard">
								<div class="menu-handle menu2-handle" >
									<i class="normal-icon ace-icon fa fa-reply  bigger-130 sombra"></i>
								</div>
								<div class="menu2-content">
								Volver al Dashboard
								</div>
							</a>
						</li>

			</ol>
		</div>
@endif






























<style>
.sombra {
	text-shadow: 1px 2px 3px #696;
}
.ace-icon {
    text-align: left;

}
.bigger-130 {
    font-size: 150%!important;
}

.blue {
    color: #478FCA;


}
.carpeta {
    color: #fbe983;


}
.red {
    color: #ec2b0a;

}

.gree{
    color: #1dd01a;

}
.menu {
    margin: 0;
    margin-right:5px;
    max-width: 325px;
    line-height: 20px;
}
.menu, .menu-item, .menu-list {
    position: relative;
}

.menu-list {
    display: block;
    list-style: none;

}
i {
	margin-left:auto;
	margin-right:auto;
	margin-top:auto;
	margin-bottom:auto;

}
.menu2-handle {
    left: 0;
    top: -5px;
    width: 39px;
    margin: 0;
    text-align: center;
    line-height: 39px;
    height: 38px;
  background: #b9c0c7;
    border: 1px solid #b9c0c7;
    cursor: pointer;
    overflow: hidden;
    position: absolute;
    z-index: 1;
}
.cuerpo {
    background-color: #E4E6E9;
    padding-bottom: 0;
    font-family: 'Open Sans';
    font-size: 3px;
    color: #393939;
    line-height: 1.5;
}
.menu2-handle+.menu2-content {
    padding-left: 55px;
}


.menu2-content:hover,a:hover{
	  cursor: pointer;
	color: #478FCA;
	background: #F4F6F7;
	border-color: #DCE2E8;
}
.menu-item:hover>.menu2-content {
	  cursor: pointer;
	color: #478FCA;
	background: #F4F6F7;
	border-color: #DCE2E8;	
	font-weight: 600;
box-shadow: 1px 1px 3px 0px rgba(0,0,0,0.75);
}
.speciala:hover>.menu2-content {
	  cursor: pointer;
	color: #478FCA;
	background: #F4F6F7;
	border-color: #DCE2E8;	
		font-weight: 600;
box-shadow: 1px 1px 3px 0px rgba(0,0,0,0.75);
}
.menu-item:hover>.menu2-handle {
	  cursor: pointer;
	color: #478FCA;
	background: #bdcbda;
	border-color: 1px solid #b9c0c7;	
  	border-radius:50%;
  	width:44px;
  	left:-3px;
  	height:44px;
  	top:-8px;
box-shadow: 1px 1px 3px 0px rgba(0,0,0,0.75);
}
.menu-item:hover>.menu2-handle>i {
  	background:#bdcbda;	
	margin-top:8px;

  font-size: 200%!important;
}


.speciala:hover>.menu2-content {
	  cursor: pointer;
	color: #478FCA;
	background: #F4F6F7;
	border-color: #DCE2E8;	
	font-weight: 700;
}
.speciala:hover>.menu2-handle {
	  cursor: pointer;
	color: #478FCA;
	background: #bdcbda;
	border-color: 1px solid #b9c0c7;	
  	border-radius:50%;
  	width:44px;
  	left:-3px;
  	height:44px;
  	top:-8px;
	box-shadow: 1px 1px 3px 0px rgba(0,0,0,0.75);
}
.speciala:hover>.menu2-handle>i {
  	background:#bdcbda;	
	margin-top:8px;
  font-size: 200%!important;
}
.menu-handle{
    border: 1px solid #b9c0c7;
	margin: 5px 0px;
	background: #dae2ea;
	border-radius:50%;
}
.papelera {
  position:absolute;
  cursor: pointer;
  color:#dd5a43;
  right:10px;
    top: 8px;
  font-size: 120%!important;
  font
}
.opciones {
	display:none;
   width: 100px;
    height: 38px;
    position: relative;
    top: -9px;
    right:-9px;
    float:right;
  	background:#e7eaf1;	
  	border:1px solid #cccfd6;
}
.edicion {
  position:absolute;
  cursor: pointer;
  color:#478FCA;
  right:28px;
    top: 8px;
  font-size: 120%!important;
}
.edicion:hover,.papelera:hover,.crear:hover,.subir:hover,.bajar:hover {
  font-size: 140%!important;

}
.crear {
  position:absolute;
  cursor: pointer;
  color:#f3f5a2;
  right:46px;
    top: 8px;
  font-size: 120%!important;
}

.subir {
  position:absolute;
  cursor: pointer;
color: #1dd01a;
  right:81px;
    top: 8px;
  font-size: 120%!important;
}
.subird {
  position:absolute;
color: #dae2ea;
  right:81px;
    top: 8px;
  font-size: 120%!important;
}
.bajar {
  position:absolute;
  cursor: pointer;
color: #1dd01a;
  right:64px;
     top: 8px;
  font-size: 120%!important;
}
.bajard {
  position:absolute;
color: #dae2ea;
  right:64px;
     top: 8px;
  font-size: 120%!important;
}
.menu2-content {
 	position:relative;
    padding-bottom: 0;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    line-height: 1.5;
    display: block;
    min-height: 38px;
    margin: 5px 0;
    padding: 8px 8px;
    background: #F8FAFF;
    border: 1px solid #DAE2EA;
    border-radius: 50px 0px 0px 50px;
    color: #7C9EB2;
    text-decoration: none;
    box-sizing: border-box;
}
a{
	color:#7C9EB2;
}
a:hover {
	text-decoration:none;
}

</style>

<script type="text/javascript">
			jQuery(function($){
				$('.menu2-content ,.menu2-handle').on('mouseenter',function(e){
					var padre=$(this).parent();
					padre.find('.opciones').first().attr("style","display:block");
				});
				$('.menu2-content ,.menu2-handle').on('mouseleave',function(e){
					var padre=$(this).parent();
					padre.find('.opciones').first().attr("style","display:none");
				});
				$('.plus').on('click',function(e){
					var actual=$(this).parent('.menu2-content').next('ol');
					if($(this).hasClass("fa fa-plus")){
						$(this).removeClass().addClass("plus").addClass("fa fa-minus sombra");
						actual.removeAttr("style").attr("style","display:block");
					}
					else
					{
						$(this).removeClass().addClass("plus").addClass("fa fa-plus sombra");
						actual.removeAttr("style").attr("style","display:none");;						
					}
				});

			});
		</script>
