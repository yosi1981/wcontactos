@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            DASHBOARD ADMINISTRADOR
        </h3>
<div class="col-sm-6 ">
										<div class="menu">
											<ol class="menu-list">
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
													</div>
													<div class="menu2-content" ><i style="position:relative;left:-5px;" class="plus  fa fa-plus  "  aria-hidden="true"></i>Provincia</div>
											<ol class="menu-list" style="display:none;" >
												<li class="menu-item menu2-item" >
													<a href="http://www.google.es">
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-image blue bigger-130"></i>
													</div>
													<div class="menu2-content" >Provincia</div>
													</a>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-pencil gree bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-tachometer red bigger-130"></i>
													</div>
													<div class="menu2-content">Anuncios</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-user blue bigger-130"></i>
													</div>
												<div class="menu2-content"><i style="position:relative;left:-5px;"  class="plus  fa fa-plus  "  aria-hidden="true"></i>Usuarios
																		<i class="edicion  fa fa-edit  bigger-130" aria-hidden="true"></i>

																		<i class=" fa fa-trash  bigger-130 papelera" aria-hidden="true"></i>
                            </div>
											<ol class="menu-list" style="display:none">
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
													</div>
													<div class="menu2-content">Provincia</div>
												</li>
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-address-book gree bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-address-book red bigger-130"></i>
													</div>
													<div class="menu2-content">Anuncios</div>
												</li>
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-address-book blue bigger-130"></i>
													</div>
													<div class="menu2-content"><i style="position:relative;left:-5px;" class="plus fa fa-plus" aria-hidden="true"></i><a href="#">Usuarios
																		<i class="edicion  fa fa-edit  bigger-130" aria-hidden="true"></i>

																		<i class="papelera fa fa-trash  bigger-130" aria-hidden="true"></i>
                            </a>
                            </div>
											<ol class="menu-list" style="display:none">
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
													</div>
													<div class="menu2-content">Provincia</div>
												</li>
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-address-book gree bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-address-book red bigger-130"></i>
													</div>
													<div class="menu2-content">Anuncios</div>
												</li>
												<li class="menu-item menu2-item">
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-address-book blue bigger-130"></i>
													</div>
													<div class="menu2-content action-buttons">
														Usuarios
														<div class="pull-right action-buttons" style="margin-top:1px;">
															<a href="#" >
																		<i class=" fa fa-file-text  bigger-130 " style="color: #399c19;" aria-hidden="true"></i>
                            								</a>
															<a href="#" >
																		<i class=" fa fa-edit  bigger-130" aria-hidden="true"></i>
								                            </a>
															<a href="#" >
																		<i class=" fa fa-trash  bigger-130 " style="color: #ec2b0a;" aria-hidden="true"></i>
                            								</a>
                            							</div>
                            						</div>
												</li>
											</ol>
                        </li>
											</ol>
												</li>
											</ol>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle">
														<i class="normal-icon ace-icon fa fa-address-book gree bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book red bigger-130"></i>
													</div>
													<div class="menu2-content"><i style="position:relative;left:-5px;" class="plus  fa fa-plus  "  aria-hidden="true"></i>Anuncios</div>
                          											<ol class="menu-list" style="display:none;">
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
													</div>
													<div class="menu2-content">Provincia</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book gree bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book red bigger-130"></i>
													</div>
													<div class="menu2-content">Anuncios</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book blue bigger-130"></i>
													</div>
													<div class="menu2-content"><i style="position:relative;left:-5px;"  class="plus  fa fa-plus  "  aria-hidden="true"></i><a href="#">Usuarios
																		<i class="edicion  fa fa-edit  bigger-130" aria-hidden="true"></i>

																		<i class="papelera fa fa-trash  bigger-130" aria-hidden="true"></i>
                            </a>
                            </div>
											<ol class="menu-list" style="display:none;">
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
													</div>
													<div class="menu2-content">Provincia</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book gree bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book red bigger-130"></i>
													</div>
													<div class="menu2-content">Anuncios</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book blue bigger-130"></i>
													</div>
													<div class="menu2-content"><a href="#">Usuarios
																		<i class="edicion  fa fa-edit  bigger-130" aria-hidden="true"></i>

																		<i class="papelera fa fa-trash  bigger-130" aria-hidden="true"></i>
                            </a>
                            </div>
												</li>
											</ol>
                        </li>
											</ol>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book blue bigger-130"></i>
													</div>
													<div class="menu2-content"><i style="position:relative;left:-5px;"  class="plus  fa fa-plus  "  aria-hidden="true"></i><a href="#">Usuarios
																		<i class="edicion  fa fa-edit  bigger-130" aria-hidden="true"></i>

																		<i class="papelera fa fa-trash  bigger-130" aria-hidden="true"></i>
                            </a>
                            </div>
											<ol class="menu-list" style="display:none;">
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
													</div>
													<div class="menu2-content">Provincia</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book green bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book red bigger-130"></i>
													</div>
													<div class="menu2-content">Anuncios</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book blue bigger-130"></i>
													</div>
													<div class="menu2-content"><i style="position:relative;left:-5px;"  class="plus  fa fa-plus  "  aria-hidden="true"></i><a href="#">Usuarios
																		<i class="edicion  fa fa-edit  bigger-130" aria-hidden="true"></i>

																		<i class="papelera fa fa-trash  bigger-130" aria-hidden="true"></i>
                            </a>
                            </div>
											<ol class="menu-list" style="display:none;">
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
													</div>
													<div class="menu2-content">Provincia</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book green bigger-130"></i>
													</div>
													<div class="menu2-content">Imagenes</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book red bigger-130"></i>
													</div>
													<div class="menu2-content">Anuncios</div>
												</li>
												<li class="menu-item menu2-item" >
													<div class="menu-handle menu2-handle" >
														<i class="normal-icon ace-icon fa fa-address-book blue bigger-130"></i>
													</div>
													<div class="menu2-content"><a href="#">Usuarios
																		<i class="edicion  fa fa-edit  bigger-130" aria-hidden="true"></i>

																		<i class="papelera fa fa-trash  bigger-130" aria-hidden="true"></i>
                            </a>
                            </div>
												</li>
											</ol>
                        </li>
											</ol>
                        </li>
											</ol>
										</div>
									</div>
    </div>
</div>
<style>
.ace-icon {
    text-align: left;

}
.bigger-130 {
    font-size: 150%!important;
}

.blue {
    color: #478FCA;
    position:absolute;
    left:10px;
    top:10px;

}
.red {
    color: #ec2b0a;
    position:absolute;
    left:10px;
    top:10px;

}

.gree{
    color: #1dd01a;
    position:absolute;
    left:10px;
    top:10px;

}
.menu {
    margin: 0;
    max-width: 300px;
    line-height: 20px;
}
.menu, .menu-item, .menu-list {
    position: relative;
}

.menu-list {
    display: block;
    padding: 10;
    list-style: none;
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
.menu-handle:hover,.menu2-content:hover,a:hover{
	  cursor: pointer;
	color: #478FCA;
	background: #F4F6F7;
	border-color: #DCE2E8
}

.menu-handle:hover{
	background:#b9c0c7;   
}
.menu-handle{
    border: 1px solid ##b9c0c7;
	margin: 5px 0px;
	background: #dae2ea;
}
.papelera {
  position:absolute;
  cursor: pointer;
  color:#dd5a43;
  right:10px;
  font-size: 120%!important;
}

.edicion {
  position:absolute;
  cursor: pointer;
  color:#478FCA;
  right:28px;
  font-size: 120%!important;
}

.menu2-content {
 
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
				$('.plus').on('click',function(e){
					var actual=$(this).parent('.menu2-content').next('ol');
					if($(this).hasClass("fa fa-plus")){
						$(this).removeClass().addClass("plus").addClass("fa fa-minus");
						actual.removeAttr("style").attr("style","display:block");
					}
					else
					{
						$(this).removeClass().addClass("plus").addClass("fa fa-plus");
						actual.removeAttr("style").attr("style","display:none");;						
					}
				});
				$('.dd').nestable();
			
				$('.dd-handle a').on('mousedown', function(e){
					e.stopPropagation();
				});
				
				$('[data-rel="tooltip"]').tooltip();
			
			});
		</script>

@endsection
