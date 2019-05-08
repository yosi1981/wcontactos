       <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php echo e(asset('/imagenes/'.Auth::user()->image)); ?>" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                       <?php echo e(Auth::user()->stringRol->nombre); ?>

                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo e(Auth::user()->name); ?>

                    </div>
                </div>
                <?php
                    if (Auth::user()->stringRol->nombre == "anunciante")
                    {
                        if(Auth::user()->DatosUsuario->dias_disponibles >= 0)
                            { 
                            	if (Auth::user()->DatosUsuario->dias_disponibles == 1) {
                                 ?>
                                    <span style="width:90%;" class="label label-success ">Tienes <?php echo e(Auth::user()->DatosUsuario->dias_disponibles); ?> día disponible</span>
                                <?php
                           		# code...
                            	}
                            	else
                            	{
                                ?>
                                    <span style="width:90%;" class="label label-success ">Tienes <?php echo e(Auth::user()->DatosUsuario->dias_disponibles); ?> días disponibles</span>
                                <?php
                            	}
                            }
                        else
                            {
                                ?>
                                    <span style="width:90%;" class="label label-danger ">No hay días disponibles</span>                    
                                <?php
                            }
                    ?>


                    <?php
                    }
                ?>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                	<a href="/anunciante/EditarUsuario/<?php echo e(Auth::user()->id); ?>">
                    <button type="button" class="btn btn-success btn-sm">Mi cuenta</button>
                	</a>
                    <a href="/logout">
                    <button type="button" class="btn btn-danger btn-sm">Salir</button>
                    </a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <style>
/***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/



/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 100px;
  height:100px;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
                </style>