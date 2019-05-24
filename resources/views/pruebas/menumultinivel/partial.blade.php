					<?php
						$seccion = \Session::get('seccion_actual');
						if (in_array($seccion, $menuitem["seccion"]) == true) 
						{
					?>
					<ol class="menu-list" style="display:block;">
					<?php
					}
					else
					{
					?>
					<ol class="menu-list" style="display:none;">
					<?php 
					}
					$i=0;
					$total=count($menuitem["items"]);
					?>
					@foreach ($menuitem["items"] as $menuitem)
											<?php $i+=1 ?>
						<li class="menu-item menu2-item" >
							<div class="menu-handle menu2-handle" >
								<i class="normal-icon ace-icon fa {{$menuitem['imagen']}} gree bigger-130"></i>
							</div>
							<div class="menu2-content">
							@if($menuitem["items"])
								<?php
									$seccion = \Session::get('seccion_actual');
									if (in_array($seccion, $menuitem["seccion"]) == true) 
									{
								?>
									<i style="position:relative;left:-5px;" class="plus  fa fa-minus  "  aria-hidden="true"></i>
								<?php
								}
								else
								{
								?>
									<i style="position:relative;left:-5px;" class="plus  fa fa-plus  "  aria-hidden="true"></i>
								<?php
								}
								?>					
							@endif
							{{$menuitem["Titulo"]}}
								@if($i>1)
									<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="subir  fa fa-arrow-up gree  bigger-130" aria-hidden="true"></i>
								@endif
								@if($i<>$total)
									<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="bajar  fa fa-arrow-down gree bigger-130" aria-hidden="true"></i>	
								@endif
								<i data-idmenu="{{$menuitem['idmenu']}}" data-idmenuitem="{{$menuitem['idmenuitem']}}" class="actualizar crear  fa fa-folder  bigger-130" aria-hidden="true"></i>
								<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="editar edicion  fa fa-pencil  bigger-130" aria-hidden="true"></i>
								<i data-idmenuitem="{{$menuitem['idmenuitem']}}" class="eliminar papelera fa fa-trash  bigger-130" aria-hidden="true"></i>
							</div>
							@if($menuitem["items"])
								@include('pruebas.menumultinivel.partial')
							@endif
						</li>
					@endforeach
						<li class="menu-item menu2-item" >
							<div class="menu-handle menu2-handle" >
								<i class="normal-icon ace-icon fa fa-folder gree bigger-130"></i>
							</div>
							<div class="menu2-content">
							Añadir item
								<i data-idmenu="{{$menuitem['idmenu']}}" data-idmenuitem="{{$menuitem['idmenuitem_padre']}}" class="actualizar crear  fa fa-folder  bigger-130" aria-hidden="true"></i>
							</div>
						</li>
					</ol>