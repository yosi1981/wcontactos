<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/pruebaIPNform', 'ImagenController@pruebaIPN');
Route::get('/pruebaCheckbox1', 'ImagenController@checkbox1');

Route::get('/logout', 'Auth\LoginController@logout');
// Rutas privadas solo para usuarios autenticados
Route::get('/mostrar/{id}', 'PrincipalController@mostrarAnuncios');
Route::get('/mostrarAnuncio/{id}', 'AnuncioProgramadoController@ShowAnuncio');
Route::post('paypalIPN', 'PaypalController@paypalIpn');
Route::get('/', 'PrincipalController@index');
Route::get('/verify/{email}/{verifytoken}', 'PrincipalController@ActivarUsuario')->
name('verifyEmail');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/telegram', 'TelegramController@getUpdates');
    Route::get('/sendMsg', 'TelegramController@sendMsg');
    Route::get('/contacts', 'ContactsController@get');
    Route::get('/conversation/{id}/', 'ContactsController@getMessagesFor');
    Route::post('/conversation/send', 'ContactsController@send');

    /*
    Route::resource('Anuncio', 'AnuncioController');

    Route::get('/crearAnuncio', 'AnuncioController@CrearAnuncio');
    Route::post('/EditarAnuncio', 'AnuncioController@EditarAnuncio');
    Route::post('/ActualizarAnuncio', 'AnuncioController@Actualizar');
    Route::post('/NuevoAnuncio', 'AnuncioController@NuevoAnuncio');
    Route::post('/eliminarAnuncio', 'AnuncioController@eliminar');
    Route::get('/searchAnuncio', 'AnuncioController@search');
    */

    Route::get('/listadoCitas/{id}', 'CitaController@listadoCitas');
    Route::get('/CitasAnuncio/{id}', 'CitaController@CitasAnuncio');
    Route::get('/nuevaCita/{id}', 'CitaController@NuevaCita');
    Route::get('/editCita/{id}', 'CitaController@EditarCita');
    Route::post('/guardarNuevaCita', 'CitaController@GuardarNuevaCita')->name('cita.guardar');
    Route::post('/updateCita', 'CitaController@UpdateCita')->name('cita.guardar');

    Route::resource('AP', 'AnuncioProgramadoController');

 

    Route::get('/home', 'HomeController@index');
    
        Route::group(['middleware' => 'Admin'], function () {
            Route::get('/admin/mas','masController1@indexmas');
        
        Route::get('/admin/mas','masController1@indexmas');
        Route::get('/admin/mas','masController1@indexmas');
        Route::get('/admin/otro','otroController1@indexotro');
        Route::get('/admin/joseba','josebaController1@indexjoseba');

        route::get('/admin/showescritoriotablas','bdController@showescritoriotablas');
        route::get('/admin/showCamposInfoTabla/{tabla}','bdController@showCamposInfoTabla');
        route::get('/admin/readfileWebRoute','editorController@readfileWebRoutes');
        route::get('/admin/readfile','editorController@readfileRoutes');
        route::get('/admin/editincludescripts','scriptsController@editincludescripts');
        route::get('/admin/readfileincludesscripts/{ruta}','scriptsController@readfileincludesscripts');        
        Route::get('/admin/editincludesstyles','stylesController@readfileincludesstyles');
        Route::get('/admin/writefileincludecss','stylesController@writefileincludecss');

    Route::resource('/Usuario', 'UsuarioController');
    Route::get('/crearUsuario', 'UsuarioController@CrearUsuario');
    Route::get('/EditarUsuario/{id}', 'UsuarioController@edit');
    Route::get('/ActualizarUsuario/{id}', 'UsuarioController@Actualizar');
    Route::post('/NuevoUsuario', 'UsuarioController@NuevoUsuario');
    Route::post('/eliminarUsuario', 'UsuarioController@eliminar');
    Route::get('/searchUsuario', 'UsuarioController@search');
    
        Route::get('/admin/SaveToFile/{idmenu}','menuController@saveToFile');
        Route::get('/admin/editmenu/{idmenu?}','menuController@editmenu');
        Route::get('/admin/eliminarmenuitem/{id}','menuController@eliminarmenuitem');
        Route::get('/admin/showmenu/{idmenu}/{edit}','menuController@showmenu');
        Route::get('/admin/newmenuitem/{idmenu}/{idmenuitem}','menuController@newmenuitem');
        Route::get('/admin/guardarmenuitem','menuController@savemenuitem');
        Route::get('/admin/editmenuitem/{idmenuitem}','menuController@editmenuitem');
        Route::get('/admin/updatemenuitem/','menuController@updatemenuitem');
        Route::get('/prueba1', 'PrincipalController@pruebavue');
        Route::get('/admin/infoweb', 'InfoWebController@index');
        Route::get('/admin/info', 'InfoWebController@info');
        Route::get('/admin/chart', 'InfoWebController@chart');

        Route::get('/admin/getAnunciosProvinciaPorMes', 'InfoWebController@getAnunciosProvinciaPorMes');
        Route::get('/admin/GetFacturasPagar', 'FacturasController@GetFacturasPagar');
        Route::post('/admin/PxL', 'PaypalController@crearPAGOxLOTES');
        Route::get('/admin/listarPxL', 'PaypalController@listarPxL');
        Route::get('/admin/PendienteFacturar', 'FacturasController@PendienteFacturar');
        Route::get('/admin/PendienteFacturarProv', 'FacturasController@PendienteFacturarProv');
        Route::get('/admin/PendienteFacturarAdmin', 'FacturasController@PendienteFacturarAdmin');
        Route::get('/admin/facturarUsuario/{idusuario}', 'FacturasController@facturarUsuario');
        Route::get('/admin/facturarTodosUsuarios', 'FacturasController@facturarTodosUsuarios');
        Route::get('/admin/VerFactura/{idfactura}', 'FacturasController@VerFactura');
        Route::get('/admin/listarPendienteReferidos', 'FacturasController@listarPendienteReferidos');
        Route::get('/admin/getUserFacturas', 'FacturasController@getUserFacturas');
        Route::get('/admin/getAllFacturas', 'FacturasController@getAllFacturas');
        Route::get('/admin/createAP/{id}', 'AnuncioProgramadoController@CrearAnuncioProgramado');
        Route::get('/admin/editarAnuncioProgramado/{id}', 'AnuncioProgramadoController@editarAnuncioProgramado');
        Route::get('/admin/listarAnunciosProgramados', 'AnuncioProgramadoController@listarAnunciosProgramados');

        Route::get('/admin/searchAP', 'AnuncioProgramadoController@search');
        Route::post('/admin/eliminarAP', 'AnuncioProgramadoController@eliminarAP');
        Route::get('/admin/createAnunProLoca/{id}', 'anunciosProgramadosLocalidad@createAnunProLoca');
        Route::post('/admin/nuevoAnuncioProLocal', 'anunciosProgramadosLocalidad@nuevoAnuncioProLocal');
        Route::get('/admin/getAnunciosProLocal/{id}', 'anunciosProgramadosLocalidad@getAnunciosProLocal');
        Route::get('/admin/getAnuncioProLocal/{id}', 'anunciosProgramadosLocalidad@getAnuncioProLocal');
        Route::post('/admin/UpdateAPL', 'anunciosProgramadosLocalidad@UpdateAPL');
        Route::get('/admin/deleteAPLpre/{id}', 'anunciosProgramadosLocalidad@deleteAPLpre');
        Route::get('/admin/deleteAPLpost/{id}', 'anunciosProgramadosLocalidad@deleteAPLpost');
        Route::get('/admin/paquete', 'PaqueteController@getPaquetes');
        Route::get('/admin/infocuenta', 'infocuentaController@InfoReferidos');
        Route::get('/admin/dashboard', 'AdminController@Dashboard');
        Route::resource('/admin/Provincia', 'ProvinciaController');
        Route::get('/admin/getProvinciasJSON', 'ProvinciaController@getProvinciasJSON');
        Route::post('/admin/nuevaProvincia', 'ProvinciaController@nuevaProvincia');
        Route::post('/admin/eliminarProvincia', 'ProvinciaController@eliminar');
        Route::get('/admin/searchProvincia', 'ProvinciaController@search');
        Route::resource('/admin/Poblacion', 'PoblacionController');
        Route::get('/admin/getLocalidadesJSON/{id}', 'anunciosProgramadosLocalidad@getLocalidadesJSON');
        Route::post('/admin/nuevaPoblacion', 'PoblacionController@nuevaPoblacion');
        Route::post('/admin/eliminarlocalidad', 'PoblacionController@eliminar');
        Route::post('/admin/editarlocalidad', 'PoblacionController@editar');
        Route::post('/admin/actualizarlocalidad', 'PoblacionController@actualizar');
        Route::get('/admin/getPoblaciones', 'PoblacionController@getPoblacionesProvincia');
        Route::get('/admin/llenarLocalidades', 'PoblacionController@selectLocalidades');
        Route::resource('/admin/Promocion', 'PromocionController');
        Route::get('/admin/searchPromocion', 'PromocionController@search');
        Route::post('/admin/eliminarPromocion', 'PromocionController@eliminar');

        Route::resource('/admin/Imagen', 'ImagenController');
        Route::post('/admin/uploadimage', 'ImagenController@Almacenar');
        Route::post('/admin/eliminarimagen', 'ImagenController@eliminar');
        route::get('/admin/getImages', 'ImagenController@getImages');
        route::get('/admin/getImagesUser', 'ImagenController@getImagesUser');
        Route::get('/IniciarUsuario/{id}', 'UsuarioController@IniciarSesion');

    Route::resource('/admin/Anuncio', 'AnuncioController');
   Route::get('/admin/crearAnuncio', 'AnuncioController@CrearAnuncio');
    Route::post('/admin/EditarAnuncio', 'AnuncioController@EditarAnuncio');
    Route::post('/admin/ActualizarAnuncio', 'AnuncioController@Actualizar');
    Route::post('/admin/NuevoAnuncio', 'AnuncioController@NuevoAnuncio');
    Route::post('/admin/eliminarAnuncio', 'AnuncioController@eliminar');
    Route::get('/admin/searchAnuncio', 'AnuncioController@search');
        });

    Route::group(['middleware' => 'Delegado'], function () {
        Route::get('/delegado/dashboard', 'DelegadoController@Dashboard');

    });

    Route::group(['middleware' => 'AdminProvincia'], function () {
        Route::get('/adminProvincia/listarPendienteReferidos', 'FacturasController@listarPendienteReferidos');
        Route::get('/adminProvincia/getUserFacturas', 'FacturasController@getUserFacturas');
        Route::get('/adminProvincia/VerFactura/{idfactura}', 'FacturasController@VerFactura');
        Route::get('/adminProvincia/Provincia', 'ProvinciaController@index');
        Route::get('/adminProvincia/searchProvincia', 'ProvinciaController@search');
        Route::get('/adminProvincia/dashboard', 'AdminProvinciaController@Dashboard');
        Route::get('/adminProvincia/infocuenta', 'infocuentaController@InfoReferidos');
        Route::get('/adminProvincia/listarPendienteReferidos', 'FacturasController@listarPendienteReferidos');
        Route::get('/adminProvincia/getUserFacturas', 'FacturasController@getUserFacturas');
    });

    Route::group(['middleware' => 'Colaborador'], function () {
        Route::get('/colaborador/dashboard', 'ColaboradorController@Dashboard');
        Route::get('/colaborador/infocuenta', 'infocuentaController@InfoReferidos');
    });

    Route::group(['middleware' => 'Anunciante'], function () {
    Route::resource('/UsuarioA', 'UsuarioController');
    Route::get('/anunciante/EditarUsuario/{id}', 'UsuarioController@edit');

        Route::get('/anunciante/listarPendienteReferidos', 'FacturasController@listarPendienteReferidos');
        Route::get('/anunciante/getUserFacturas', 'FacturasController@getUserFacturas');
        Route::get('/anunciante/VerFactura/{idfactura}', 'FacturasController@VerFactura');
        Route::get('/anunciante/createAP/{id}', 'AnuncioProgramadoController@CrearAnuncioProgramado');
        Route::get('/anunciante/editarAnuncioProgramado/{id}', 'AnuncioProgramadoController@editarAnuncioProgramado');
        Route::get('/anunciante/listarAnunciosProgramados', 'AnuncioProgramadoController@listarAnunciosProgramados');
        Route::get('/anunciante/searchAP', 'AnuncioProgramadoController@search');
        Route::post('/anunciante/eliminarAP', 'AnuncioProgramadoController@eliminarAP');
            Route::resource('/anunciante/AnuncioA', 'AnuncioController');

    Route::get('/anunciante/crearAnuncio', 'AnuncioController@CrearAnuncio');
    Route::post('/anunciante/EditarAnuncio', 'AnuncioController@EditarAnuncio');
    Route::post('/anunciante/ActualizarAnuncio', 'AnuncioController@Actualizar');
    Route::post('/anunciante/NuevoAnuncio', 'AnuncioController@NuevoAnuncio');
    Route::post('/anunciante/eliminarAnuncio', 'AnuncioController@eliminar');
    Route::get('/anunciante/searchAnuncio', 'AnuncioController@search');
        Route::get('/anunciante/createAnunProLoca/{id}', 'anunciosProgramadosLocalidad@createAnunProLoca');
        Route::post('/anunciante/nuevoAnuncioProLocal', 'anunciosProgramadosLocalidad@nuevoAnuncioProLocal');
        Route::get('/anunciante/getAnunciosProLocal/{id}', 'anunciosProgramadosLocalidad@getAnunciosProLocal');
        Route::get('/anunciante/getAnuncioProLocal/{id}', 'anunciosProgramadosLocalidad@getAnuncioProLocal');
        Route::get('/anunciante/getLocalidadesJSON/{id}', 'anunciosProgramadosLocalidad@getLocalidadesJSON');
        Route::post('/anunciante/UpdateAPL', 'anunciosProgramadosLocalidad@UpdateAPL');
        Route::get('/anunciante/deleteAPLpre/{id}', 'anunciosProgramadosLocalidad@deleteAPLpre');
        Route::get('/anunciante/deleteAPLpost/{id}', 'anunciosProgramadosLocalidad@deleteAPLpost');
        Route::get('/anunciante/paquete', 'PaqueteController@getPaquetes');
        Route::get('/anunciante/infocuenta', 'infocuentaController@InfoReferidos');
        Route::resource('/anunciante/Imagen', 'ImagenController');
        Route::post('/anunciante/uploadimage', 'ImagenController@Almacenar');
        Route::post('/anunciante/eliminarimagen', 'ImagenController@eliminar');
        route::get('/anunciante/getImages', 'ImagenController@getImages');
        route::get('/anunciante/getImagesUser', 'ImagenController@getImagesUser');

        Route::get('/anunciante/dashboard', 'AnuncianteController@Dashboard');
        Route::get('/anunciante/ContratarDias', 'PaypalController@ContratarDias');
        Route::get('/mes', 'PaypalController@PROBANDOcreate_payout');
        Route::get('payment', array(
            'as'   => 'payment',
            'uses' => 'PaypalController@postPayment',
        ));
        // Después de realizar el pago Paypal redirecciona a esta ruta
        Route::get('payment/status', array(
            'as'   => 'payment.status',
            'uses' => 'PaypalController@getPaymentStatus',
        ));
    });

/*
Route::resource('Anuncio', 'AnuncioController');
Route::get('crearAnuncio', 'AnuncioController@CrearAnuncio');
Route::post('/EditarAnuncio', 'AnuncioController@EditarAnuncio');
Route::post('/ActualizarAnuncio', 'AnuncioController@Actualizar');
Route::post('/NuevoAnuncio', 'AnuncioController@NuevoAnuncio');
Route::post('/eliminarAnuncio', 'AnuncioController@eliminar');
Route::get('/searchAnuncio', 'AnuncioController@search');
 */

});
