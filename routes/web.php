<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('roles', 'RolesController@index')->name('roles.index');
Route::get('roles-create', 'RolesController@create')->name('roles.create')->middleware('auth');
Route::post('roles/create', 'RolesController@store')->middleware('auth');
Route::get('roles-delete-{id}', 'RolesController@delete')->middleware('auth');
Route::get('roles-edit-{id}', 'RolesController@edit')->name('roles.edit');
Route::post('roles/edit', 'RolesController@update');

Route::get('personal', 'PersonalController@index')->name('personal.index');
Route::get('personal-create', 'PersonalController@create')->name('personal.create')->middleware('auth');
Route::post('personal/create', 'PersonalController@store')->middleware('auth');
Route::get('personal-delete-{id}', 'PersonalController@delete')->middleware('auth');
Route::get('personal-edit-{id}', 'PersonalController@edit')->name('personal.edit');
Route::post('personal/edit', 'PersonalController@update');

Route::get('centros', 'CentrosController@index')->name('centros.index');
Route::get('centros-create', 'CentrosController@create')->name('centros.create')->middleware('auth');
Route::post('centros/create', 'CentrosController@store')->middleware('auth');
Route::get('centros-delete-{id}', 'CentrosController@delete')->middleware('auth');
Route::get('centros-edit-{id}', 'CentrosController@edit')->name('centros.edit');
Route::post('centros/edit', 'CentrosController@update');


Route::get('medicamentos', 'MedicamentosController@index')->name('medicamentos.index');
Route::get('medicamentos-create', 'MedicamentosController@create')->name('medicamentos.create')->middleware('auth');
Route::post('medicamentos/create', 'MedicamentosController@store')->middleware('auth');
Route::get('medicamentos-delete-{id}', 'MedicamentosController@delete')->middleware('auth');
Route::get('medicamentos-edit-{id}', 'MedicamentosController@edit')->name('medicamentos.edit');
Route::post('medicamentos/edit', 'MedicamentosController@update');

Route::get('profesionales', 'ProfesionalesController@index')->name('profesionales.index');
Route::get('profesionales-create', 'ProfesionalesController@create')->name('profesionales.create')->middleware('auth');
Route::post('profesionales/create', 'ProfesionalesController@store')->middleware('auth');
Route::get('profesionales-delete-{id}', 'ProfesionalesController@delete')->middleware('auth');
Route::get('profesionales-edit-{id}', 'ProfesionalesController@edit')->name('profesionales.edit');
Route::post('profesionales/edit', 'ProfesionalesController@update');

Route::get('laboratorio', 'LaboratorioController@index')->name('laboratorio.index');
Route::get('laboratorio-create', 'LaboratorioController@create')->name('laboratorio.create')->middleware('auth');
Route::post('laboratorio/create', 'LaboratorioController@store')->middleware('auth');
Route::get('laboratorio-delete-{id}', 'LaboratorioController@delete')->middleware('auth');
Route::get('laboratorio-edit-{id}', 'LaboratorioController@edit')->name('laboratorio.edit');
Route::post('laboratorio/edit', 'LaboratorioController@update');

Route::get('usuarios', 'UserController@index')->name('usuarios.index');
Route::get('usuarios-create', 'UserController@create')->name('usuarios.create')->middleware('auth');
Route::post('usuarios/create', 'UserController@store')->middleware('auth');
Route::get('usuarios-delete-{id}', 'UserController@delete')->middleware('auth');
Route::get('usuarios-edit-{id}', 'UserController@edit')->name('usuarios.edit');
Route::post('usuarios/edit', 'UserController@update');

Route::get('crear/sesion','UserController@sesion');
Route::get('crear/otros','UserController@otros');

Route::get('users-password-edit', 'UserController@updatepasswd')->name('users.password');
Route::post('users/updatepassw', 'UserController@updatepass');



Route::get('activos', 'EquiposController@index')->name('equipos.index');
Route::get('equipos-create', 'EquiposController@create')->name('equipos.create')->middleware('auth');
Route::post('equipos/create', 'EquiposController@store')->middleware('auth');
Route::get('equipos-delete-{id}', 'EquiposController@delete')->middleware('auth');
Route::get('equipos-edit-{id}', 'EquiposController@edit')->name('equipos.edit');
Route::post('equipos/edit', 'EquiposController@update');

Route::get('requerimientos', 'RequerimientosController@index')->name('requerimientos.index');
Route::get('requerimientos1', 'RequerimientosController@index1')->name('requerimientos.index1');
Route::get('requerimientos2', 'RequerimientosController@index2')->name('requerimientos.index2');
Route::get('requerimientose', 'RequerimientosController@enviados')->name('requerimientos.enviados');
Route::get('requerimientos-create', 'RequerimientosController@create')->name('requerimientos.create')->middleware('auth');
Route::get('requerimientos-create1', 'RequerimientosController@create1')->name('requerimientos.create1')->middleware('auth');
Route::get('requerimientos-create-almacen-{id}', 'RequerimientosController@createa')->name('requerimientos.createa')->middleware('auth');
Route::post('requerimientos/create', 'RequerimientosController@store')->middleware('auth');
Route::post('requerimientos/create1', 'RequerimientosController@store1')->middleware('auth');
Route::post('requerimientos/createa', 'RequerimientosController@storea')->middleware('auth');
Route::get('requerimientos-reversar-{id}', 'RequerimientosController@reversar')->middleware('auth');
Route::get('requerimientos-edit', 'RequerimientosController@edit');
Route::get('requerimientos-delete-{id}', 'RequerimientosController@delete')->middleware('auth');
Route::post('requerimientos/edit', 'RequerimientosController@update');
Route::get('requerimientos/view/{id}', 'RequerimientosController@ver');
Route::get('requerimientos-ticket-{id}', 'RequerimientosController@ticket');


Route::get('material', 'MaterialController@index')->name('material.index');
Route::get('material-create', 'MaterialController@create')->name('material.create')->middleware('auth');
Route::post('material/create', 'MaterialController@store')->middleware('auth');
Route::get('material-delete-{id}', 'MaterialController@delete')->middleware('auth');
Route::get('material-edit-{id}', 'MaterialController@edit')->name('material.edit');
Route::post('material/edit', 'MaterialController@update');

Route::get('tiempo', 'TiempoController@index')->name('tiempo.index');
Route::get('tiempo-create', 'TiempoController@create')->name('tiempo.create')->middleware('auth');
Route::post('tiempo/create', 'TiempoController@store')->middleware('auth');
Route::get('tiempo-delete-{id}', 'TiempoController@delete')->middleware('auth');
Route::get('tiempo-edit-{id}', 'TiempoController@edit')->name('tiempo.edit');
Route::post('tiempo/edit', 'TiempoController@update');

Route::get('analisis', 'AnalisisController@index')->name('analisis.index');
Route::get('analisis-create', 'AnalisisController@create')->name('analisis.create')->middleware('auth');
Route::post('analisis/create', 'AnalisisController@store')->middleware('auth');
Route::get('analisis-delete-{id}', 'AnalisisController@delete')->middleware('auth');
Route::get('analisis-edit-{id}', 'AnalisisController@edit')->name('analisis.edit');
Route::post('analisis/edit', 'AnalisisController@update');
Route::get('analisis-dispon-{id}', 'AnalisisController@dispon');
Route::get('analisis-dispon1-{id}-{id2}', 'AnalisisController@dispon1');

Route::get('servicios', 'ServiciosController@index')->name('servicios.index');
Route::get('servicios-create', 'ServiciosController@create')->name('servicios.create')->middleware('auth');
Route::post('servicios/create', 'ServiciosController@store')->middleware('auth');
Route::get('servicios-delete-{id}', 'ServiciosController@delete')->middleware('auth');
Route::get('servicios-edit-{id}', 'ServiciosController@edit')->name('servicios.edit');
Route::post('servicios/edit', 'ServiciosController@update');
Route::get('servicios/sesiones', 'ServiciosController@sesiones');
Route::get('servicios/nada', 'ServiciosController@nada');


Route::get('paquetes', 'PaquetesController@index')->name('paquetes.index');
Route::get('paquetes-create', 'PaquetesController@create')->name('paquetes.create')->middleware('auth');
Route::post('paquetes/create', 'PaquetesController@store')->middleware('auth');
Route::get('paquetes-delete-{id}', 'PaquetesController@delete')->middleware('auth');
Route::get('paquetes-edit-{id}', 'PaquetesController@edit')->name('paquetes.edit');
Route::post('paquetes/edit', 'PaquetesController@update');
Route::get('paquetes/ver/{id}', 'PaquetesController@ver')->middleware('auth');



Route::get('pacientes', 'PacientesController@index')->name('pacientes.index');
Route::get('pacientes-create', 'PacientesController@create')->name('pacientes.create')->middleware('auth');
Route::get('pacientes-create2', 'PacientesController@create2')->name('pacientes.create2')->middleware('auth');
Route::post('pacientes/create', 'PacientesController@store')->middleware('auth');
Route::post('pacientes/create2', 'PacientesController@store2')->middleware('auth');
Route::get('pacientes-delete-{id}', 'PacientesController@delete')->middleware('auth');
Route::get('pacientes-edit-{id}', 'PacientesController@edit')->name('pacientes.edit');
Route::get('pacientes/ver/{id}', 'PacientesController@ver');
Route::post('pacientes/edit', 'PacientesController@update');

Route::get('resultados/anotar/{id}', 'ResultadosController@anotar');
Route::post('resultados/anotar', 'ResultadosController@anotarPost');
Route::get('anotaciones', 'ResultadosController@anotaciones')->name('anotaciones.index');
Route::get('anotaciones/registrarg/{id}', 'ResultadosController@anotaG');
Route::get('anotaciones/ver/{id}', 'ResultadosController@anotaV');
Route::get('anotaciones/indicacion/{id}', 'ResultadosController@anotaI');
Route::post('anotaciones/registrar', 'ResultadosController@anotaP');






Route::get('productos_usados', 'ProductosUsadosController@index')->name('productosu.index');
Route::get('productos_usados1', 'ProductosUsadosController@index1')->name('productosu.index1');
Route::get('productos-usados-creater', 'ProductosUsadosController@creater')->name('productosu.creater')->middleware('auth');
Route::get('productos-usados-createl', 'ProductosUsadosController@createl')->name('productosu.createl')->middleware('auth');
Route::get('productos-usados-createo', 'ProductosUsadosController@createo')->name('productosu.createo')->middleware('auth');
Route::get('productos-usados-createra', 'ProductosUsadosController@createra')->name('productosu.createra')->middleware('auth');
Route::get('productos-usados-create', 'ProductosUsadosController@create')->name('productosu.create')->middleware('auth');
Route::post('productos-usados/create', 'ProductosUsadosController@store')->middleware('auth');
Route::post('productos-usados/createl', 'ProductosUsadosController@storel')->middleware('auth');
Route::post('productos-usados/creater', 'ProductosUsadosController@storer')->middleware('auth');
Route::post('productos-usados/createo', 'ProductosUsadosController@storeo')->middleware('auth');
Route::post('productos-usados/createra', 'ProductosUsadosController@storera')->middleware('auth');
Route::get('productos-usados-delete-{id}', 'ProductosUsadosController@delete')->middleware('auth');
Route::get('productos-usados-reversar-{id}', 'ProductosUsadosController@reversar')->middleware('auth');
Route::get('productos-usados-reversar1-{id}', 'ProductosUsadosController@reversar1')->middleware('auth');
Route::get('productos-usados-edit-{id}', 'ProductosUsadosController@edit')->name('productosu.edit');
Route::post('productosu/edit', 'ProductosUsadosController@update');

Route::get('crear-sesion', 'UserController@sesion')->name('sesion.create')->middleware('auth');


Route::get('solicitudes', 'SolicitudesController@index')->name('solicitudes.index');
Route::get('pagadas', 'SolicitudesController@pagadas')->name('pagadas.index');
Route::get('solicitudes1', 'SolicitudesController@index1')->name('solicitudes.index1');
Route::get('solicitudes-create', 'SolicitudesController@create')->name('solicitudes.create')->middleware('auth');
Route::post('solicitudes/create', 'SolicitudesController@store')->middleware('auth');
Route::get('solicitudes-delete-{id}', 'olicitudesController@delete')->middleware('auth');
Route::get('solicitudes-edit-{id}', 'SolicitudesController@edit')->name('solicitudes.edit');
Route::get('solicitudes-pagar-{id}', 'SolicitudesController@pagar');
Route::get('solicitudes-rev-{id}', 'SolicitudesController@reversar');
Route::post('solicitudes/edit', 'SolicitudesController@update');
Route::get('solicitudes/view/{id}', 'SolicitudesController@ver');


Route::get('ingresos', 'IngresosController@index')->name('ingresos.index');
Route::get('ingresos-create', 'IngresosController@create')->name('ingresos.create')->middleware('auth');
Route::post('ingresos/create', 'IngresosController@store')->middleware('auth');
Route::get('ingresos-delete-{id}', 'IngresosController@delete')->middleware('auth');
Route::get('ingresos-edit-{id}', 'IngresosController@edit')->name('ingresos.edit');
Route::post('ingresos/edit', 'IngresosController@update');
Route::get('ingresos-ticket-{id}', 'IngresosController@ticket');

Route::get('atenciones', 'AtencionesController@index')->name('atenciones.index');
Route::get('atenciones-create', 'AtencionesController@create')->name('atenciones.create')->middleware('auth');
Route::post('atenciones/create', 'AtencionesController@store')->middleware('auth');
Route::get('atenciones-delete-{id}', 'AtencionesController@delete')->middleware('auth');
Route::get('atenciones-ticket-{id}', 'AtencionesController@ticket')->middleware('auth');
Route::get('atenciones-ticketl-{id}', 'AtencionesController@ticketl')->middleware('auth');
Route::get('atenciones-edits-{id}', 'AtencionesController@edits')->name('atenciones.edits');
Route::get('atenciones-editl-{id}', 'AtencionesController@editl')->name('atenciones.editl');
Route::get('atenciones-editp-{id}', 'AtencionesController@editp')->name('atenciones.editp');
Route::get('atenciones-editc-{id}', 'AtencionesController@editc')->name('atenciones.editc');
Route::get('atenciones-editm-{id}', 'AtencionesController@editm')->name('atenciones.editm');
Route::get('atenciones-editsa-{id}', 'AtencionesController@editsa')->name('atenciones.editsa');
Route::get('atenciones-archivo-{id}', 'AtencionesController@guardar_archivo_get');
Route::post('atenciones_archivo', 'AtencionesController@guardar_archivo');
Route::get('atenciones-ver-archivo-{id}', 'AtencionesController@ver_archivos');
Route::get('archivos-eliminar-{id}', 'AtencionesController@eliminar_archivos');
Route::get('atenciones-ver-{id}', 'AtencionesController@ver')->middleware('auth');

Route::get('pagos-personal', 'PagosPersonalController@index')->name('pagosp.index');
Route::get('pagosp-create', 'PagosPersonalController@create')->name('pagosp.create')->middleware('auth');
Route::post('pagosp/create', 'PagosPersonalController@store')->middleware('auth');
Route::get('pagosp-delete-{id}', 'PagosPersonalController@delete')->middleware('auth');
Route::get('pagosp/edit/{id}', 'PagosPersonalController@edit');
Route::post('pagosp/editar', 'PagosPersonalController@update');
Route::get('pagosp-ticket-{id}', 'PagosPersonalController@ticket');

Route::get('sesiones', 'AtencionesController@sesiones1')->name('sesiones.index');
Route::get('sesiones-atendidas', 'AtencionesController@sesiones2')->name('sesiones1.index');
Route::get('sesiones-atender', 'AtencionesController@atender_sesion');
Route::get('sesiones-reversar-{id}', 'AtencionesController@reversar_sesion');



Route::post('atenciones/edit', 'AtencionesController@update');
Route::post('atenciones/edits', 'AtencionesController@updates');
Route::post('atenciones/editl', 'AtencionesController@updatel');
Route::post('atenciones/editp', 'AtencionesController@updatep');
Route::post('atenciones/editc', 'AtencionesController@updatec');
Route::post('atenciones/editm', 'AtencionesController@updatem');

Route::get('activos', 'ActivosController@index')->name('activos.index');
Route::get('activos-create', 'ActivosController@create')->name('activos.create')->middleware('auth');
Route::post('activos/create', 'ActivosController@store')->middleware('auth');
Route::get('activos-delete-{id}', 'ActivosController@delete')->middleware('auth');
Route::get('activos-deletea-{id}', 'ActivosController@deletea')->middleware('auth');
Route::get('activos-edit-{id}', 'ActivosController@edit')->name('activos.edit');
Route::post('activos/edit', 'ActivosController@update');
Route::get('activos/ver/{id}', 'ActivosController@ver');

Route::get('proformas', 'ProformasController@index')->name('proformas.index');
Route::get('proformas-create', 'ProformasController@create')->name('proformas.create')->middleware('auth');
Route::post('proformas/create', 'ProformasController@store')->middleware('auth');
Route::get('proformas-delete-{id}', 'ProformasController@delete')->middleware('auth');
Route::get('proformas-upload-{id}', 'ProformasController@upload')->name('upload.edit');
Route::post('proformas/edit', 'ProformasController@update');
Route::get('proformas/ver/{id}', 'ProformasController@ver');
Route::get('modelo-proforma-{id}-{id2}', 'ProformasController@modelo_informe');
Route::post('proformas/upload', 'ProformasController@uploadPost')->middleware('auth');



Route::get('atenciones/getServicio/{id}', 'AtencionesController@getServicio')->middleware('auth');
Route::get('atenciones/getAnalisis/{id}', 'AtencionesController@getAnalisis')->middleware('auth');
Route::get('atenciones/getPaquetes/{id}', 'AtencionesController@getPaquetes')->middleware('auth');
Route::get('atenciones/personal','AtencionesController@personal');
Route::get('atenciones/profesionales','AtencionesController@profesionales');
Route::get('atenciones/particular','AtencionesController@particular');

Route::get('cobrar', 'CobrarController@index')->name('cobrar.index');
Route::get('historial_cobros', 'CobrarController@historial')->name('historialc.index');
Route::get('atenciones/cobrar/{id}', 'CobrarController@cobrar');
Route::get('cobro-ticket-{id}', 'CobrarController@ticket');
Route::get('cobrar-create', 'CobrarController@create')->name('cobrar.create')->middleware('auth');
Route::post('cobrar/procesar', 'CobrarController@procesar')->middleware('auth');
Route::get('historialc-reversar-{id}-{id2}', 'CobrarController@reversar')->middleware('auth');
Route::get('cobrar-delete-{id}', 'IngresosController@delete')->middleware('auth');
Route::get('cobrar-delete-{id}', 'IngresosController@delete')->middleware('auth');
Route::get('historialc-reversar-{id}', 'IngresosController@delete')->middleware('auth');
Route::get('cobrar-edit-{id}', 'IngresosController@edit')->name('ingresos.edit');
Route::post('cobrar/edit', 'IngresosController@update');
Route::get('cobrar-ticket-{id}', 'IngresosController@ticket');

Route::get('resultados', 'ResultadosController@index')->name('resultados.index');
Route::get('resultadosl', 'ResultadosController@index1')->name('resultados.index1');

Route::get('resultados-asoc-{id}', 'ResultadosController@asociar');
Route::get('resultados-asocl-{id}', 'ResultadosController@asociarl');
Route::get('resultados-desoc-{id}', 'ResultadosController@desoc');
Route::get('resultados-desocl-{id}', 'ResultadosController@desocl');
Route::get('resultados-reversar-{id}', 'ResultadosController@reversar');
Route::get('resultados-reversarl-{id}', 'ResultadosController@reversarl');
Route::get('modelo-informe-{id}-{id2}', 'ResultadosController@modelo_informe');
Route::get('modelo-informel-{id}-{id2}', 'ResultadosController@modelo_informel');
Route::get('resultados-imagenes-{id}', 'ResultadosController@imagenes');
Route::post('resultados_imaganes', 'ResultadosController@postImagenes');



Route::get('resultados-guardar-{id}', 'ResultadosController@guardar_informe');
Route::get('resultados-guardarl-{id}', 'ResultadosController@guardar_informel');
Route::post('resultados_guardar', 'ResultadosController@guardar');
Route::post('resultados_guardarl', 'ResultadosController@guardarl');
Route::get('materiales-usados', 'ResultadosController@materiales')->name('materiales.index');
Route::get('materiales-malogrados', 'ResultadosController@materialesm')->name('materialesm.index');



Route::get('resultadosg', 'ResultadosController@indexg')->name('resultados.indexg');
Route::get('resultadosg-reversar-{id}', 'ResultadosController@reversarg');
Route::get('resultadosg-entregar-{id}', 'ResultadosController@entregar');
Route::get('resultadosgl-entregar-{id}', 'ResultadosController@entregarl');
Route::get('resultadosgl', 'ResultadosController@indexg1')->name('resultados.indexg1');
Route::get('resultadosgl-reversar-{id}', 'ResultadosController@reversargl');


Route::get('historial_pacientes', 'ReportesController@historial_pacientes')->name('historial.pacientes');
Route::get('reporte-paquetes-{id}', 'ReportesController@reporte_paquetes');
Route::get('reporte_pacientes', 'ReportesController@reporte_pacientes')->name('reporte.pacientes');



Route::get('reporte_individual', 'ReportesController@reporte_individual')->name('reporte.individual');
Route::get('rep-ind/{id}/{id2}/{f1}/{f2}', 'ReportesController@reporte_individual_pdf');

Route::get('reporte_asignacion', 'ReportesController@reporte_asignacion')->name('reporte.asignacion');

Route::get('reporte_provincia', 'ReportesController@reporte_provincia')->name('reporteprov');
Route::get('reporte_referencia', 'ReportesController@reporte_referencia')->name('reporteref');



Route::get('comisiones', 'ComisionesPagarController@index')->name('comisiones.index');
Route::get('comisiones1', 'ComisionesPagarController@index1')->name('comisiones.index1');
Route::get('comisiones2', 'ComisionesPagarController@index2')->name('comisiones.index2');
Route::get('comisiones-pagar-{id}', 'ComisionesPagarController@pagar')->middleware('auth');
Route::post('pagarmultiple', 'ComisionesPagarController@pagarmultiple');
Route::get('reporte_compagar', 'ComisionesPagarController@reporte_compagar')->name('compagar.index');
Route::get('reporte_compagar1', 'ComisionesPagarController@reporte_compagar1')->name('compagar1.index');

Route::get('comisionesp', 'ComisionesPagadasController@index')->name('comisionesp.index');
Route::get('comisionesp1', 'ComisionesPagadasController@index1')->name('comisionesp.index1');
Route::get('comisionesp-reversar-{id}', 'ComisionesPagadasController@reversar');
Route::get('comisionep-ticket-{id}', 'ComisionesPagadasController@ticket')->middleware('auth');
Route::get('comisionepp-ticket-{id}', 'ComisionesPagadasController@ticketp')->middleware('auth');
Route::get('reporte/pagadas', 'ComisionesPagadasController@reporte_pagadas');
Route::get('reporte/pagadas1', 'ComisionesPagadasController@reporte_pagadas1');

Route::get('comisiones-por-entregar', 'VisitadorController@index')->name('comisionespe.index');
Route::get('comisiones-entregadas', 'VisitadorController@index1')->name('comisionese.index');
Route::get('entregar', 'VisitadorController@entregar');
Route::get('cumpleaños', 'VisitadorController@cumpleaños')->name('cumpleaños.index');
Route::get('comisionese-reversar-{id}', 'VisitadorController@reversar');

Route::get('consultas', 'ConsultasController@index')->name('consultas.index');
Route::get('consultas-create', 'ConsultasController@create')->name('consultas.create')->middleware('auth');
Route::get('consultas-admision-{id}', 'ConsultasController@admision')->name('consultas.admision')->middleware('auth');
Route::get('consultas-admisionm-{id}', 'ConsultasController@admisionm')->name('consultas.admisionm')->middleware('auth');
Route::get('consultas-ver-{id}', 'ConsultasController@ver')->name('consultas.ver')->middleware('auth');
Route::get('consultas-editar-atencion-{id}', 'ConsultasController@editarAtencion')->name('consultas.editatencion')->middleware('auth');
Route::get('consultas-atencion-{id}', 'ConsultasController@atencion')->name('consultas.atencion')->middleware('auth');
Route::get('consultas-evolucion-{id}', 'ConsultasController@evolucion')->name('consultas.evolucion')->middleware('auth');
Route::get('consultas-urologia-{id}', 'ConsultasController@uro')->name('consultas.uro')->middleware('auth');
Route::get('consultas-atencionm-{id}', 'ConsultasController@atencionm')->name('consultas.atencionm')->middleware('auth');
Route::post('consultas/create', 'ConsultasController@store')->middleware('auth');
Route::post('consultas/admision', 'ConsultasController@storeAdmision')->middleware('auth');
Route::post('consultas/atencion', 'ConsultasController@storeAtencion')->middleware('auth');
Route::post('consultas/evolucion', 'ConsultasController@storeEvolucion')->middleware('auth');
Route::post('consultas/update', 'ConsultasController@update')->middleware('auth');
Route::post('consultas/updateAtencion', 'ConsultasController@updateAtencion')->middleware('auth');
Route::get('consultas-delete-{id}', 'ConsultasController@delete')->middleware('auth');
Route::get('cobrconsultasar-edit-{id}', 'ConsultasController@edit')->name('ingresos.edit');
Route::post('consultas/edit', 'ConsultasController@update');
Route::get('consultas-ticket-{id}', 'ConsultasController@ticket');
Route::get('controles-ant-reversar-{id}', 'ConsultasController@reversar_ant_cont');
Route::get('historia-ant-reversar-{id}', 'ConsultasController@reversar_ant_hist');
Route::get('consultas-editar-{id}', 'ConsultasController@editar')->name('consultas.editar')->middleware('auth');



Route::get('historias', 'ConsultasController@historias')->name('historias.index');
Route::get('historia/reevaluar/{id}', 'ConsultasController@reevaluar');
Route::post('historia/reevaluar', 'ConsultasController@reevaluarPost');
Route::get('historias-ver-{id}', 'ConsultasController@ver_historias');
Route::get('historiasp-ver-{id}', 'ConsultasController@ver_historiasp');
Route::get('historiasm-ver-{id}', 'ConsultasController@ver_historiasm');
Route::get('historiasm-pdf-{id}', 'ConsultasController@ver_historiasm_pdf');
Route::get('historiasp-pdf-{id}', 'ConsultasController@ver_historiasp_pdf');
Route::get('historias-pdf-{id}', 'ConsultasController@ver_historias_pdf');

Route::get('controles', 'ConsultasController@controles')->name('controles.index');
Route::get('controles-ver-{id}', 'ConsultasController@ver_controles');
Route::get('historia-crear-{id}', 'ConsultasController@historia_crear');
Route::get('historiap-crear-{id}', 'ConsultasController@historiap_crear');
Route::get('historiam-crear-{id}', 'ConsultasController@historiam_crear');
Route::get('control-crear-{id}', 'ConsultasController@control_crear');
Route::post('historia/guardar', 'ConsultasController@guardar_historia');
Route::post('historiap/guardar', 'ConsultasController@guardar_historiap');
Route::post('historiam/guardar', 'ConsultasController@guardar_historiam');
Route::post('historiab/guardar', 'ConsultasController@guardar_historiab');
Route::post('historiabp/guardar', 'ConsultasController@guardar_historiabp');
Route::post('historiabm/guardar', 'ConsultasController@guardar_historiabm');
Route::post('control/guardar', 'ConsultasController@guardar_control');
Route::post('controlh/guardar', 'ConsultasController@guardar_controlh');


Route::get('metodos', 'MetodosController@index')->name('metodos.index');
Route::get('metodos_llamar', 'MetodosController@llamar')->name('llamar.index');
Route::get('metodos-create', 'MetodosController@create')->name('metodos.create')->middleware('auth');
Route::get('metodos-llamar-{id}', 'MetodosController@llamarPost')->middleware('auth');
Route::post('metodos/create', 'ConsultasController@store')->middleware('auth');
Route::get('metodos-delete-{id}', 'ConsultasController@delete')->middleware('auth');
Route::get('metodos-edit-{id}', 'ConsultasController@edit')->name('ingresos.edit');
Route::get('metodos/aplicar/{id}', 'MetodosController@aplicar');
Route::post('metodos/aplicar', 'MetodosController@aplicarPost');
Route::post('metodos/edit', 'ConsultasController@update');
Route::get('metodos-ticket-{id}', 'ConsultasController@ticket');






Route::get('ingresos/siniestros','IngresosController@solicitudes');
Route::get('ingresos/otros','IngresosController@otros');



Route::get('checkin', 'CheckinController@index')->name('checkin.index');
Route::get('checkin-create', 'CheckinController@create')->name('ckeckin.create')->middleware('auth');
Route::post('checkin/create', 'CheckinController@store')->middleware('auth');
Route::post('checkin/recargar', 'CheckinController@recarga');
Route::get('checkin-delete-{id}', 'CheckinController@delete')->middleware('auth');
Route::get('checkin-crear-{id}', 'CheckinController@crearhome')->name('ckeckin.createhome')->middleware('auth');
Route::get('checkin-edit-{id}', 'CheckinController@edit')->name('checkin.edit');
Route::post('checkin/edit', 'CheckinController@update');
Route::get('checkin/view/{id}', 'CheckinController@ver');
Route::get('checkin-ticket-{id}', 'CheckinController@ticket');
Route::get('checkin-delete-{id}','CheckinController@delete');
Route::get('checkin-recargar-{id}', 'CheckinController@recargar');



Route::get('pedidos', 'PedidosController@index')->name('pedidos.index');
Route::get('pedidos-create', 'PedidosController@create')->name('pedidos.create')->middleware('auth');
Route::post('pedidos/create', 'PedidosController@store')->middleware('auth');
Route::get('pedidos-delete-{id}', 'PedidosController@delete')->middleware('auth');
Route::get('pedidos-edit-{id}', 'PedidosController@edit')->name('pedidos.edit');
Route::get('pedidos-pagar-{id}', 'PedidosController@pagar');
Route::get('pedidos-ticket-{id}', 'PedidosController@ticket');
Route::post('pedidos/edit', 'PedidosController@update');
Route::post('pedidos/pagar', 'PedidosController@pago');

Route::get('gastos', 'GastosController@index')->name('gastos.index');
Route::get('gastos-create', 'GastosController@create')->name('gastos.create')->middleware('auth');
Route::get('gastos-createb', 'GastosController@createb')->name('gastosb.create')->middleware('auth');
Route::get('gastos-createc', 'GastosController@createc')->name('gastosc.create')->middleware('auth');
Route::post('gastos/create', 'GastosController@store')->middleware('auth');
Route::post('gastos/createb', 'GastosController@storeb')->middleware('auth');
Route::post('gastos/createc', 'GastosController@storec')->middleware('auth');
Route::get('gastos-delete-{id}', 'GastosController@delete')->middleware('auth');
Route::get('gastosb-delete-{id}', 'GastosController@deleteb')->middleware('auth');
Route::get('gastosc-delete-{id}', 'GastosController@deletec')->middleware('auth');
Route::get('gastos-edit-{id}', 'GastosController@edit')->name('gastos.edit');
Route::get('gastos-ticket-{id}', 'GastosController@ticket');
Route::post('gastos/edit', 'GastosController@update');

Route::get('siniestros', 'SiniestrosController@index')->name('siniestros.index');
Route::get('siniestros-create', 'SiniestrosController@create')->name('siniestros.create')->middleware('auth');
Route::post('siniestros/create', 'SiniestrosController@store')->middleware('auth');
Route::get('siniestros-delete-{id}', 'SiniestrosController@delete')->middleware('auth');
Route::get('siniestros-edit-{id}', 'SiniestrosController@edit')->name('siniestros.edit');
Route::post('siniestros/edit', 'SiniestrosController@update');

Route::get('reporte_ingresos', 'ReportesController@ingresos')->name('reporte_ingresos.index');
Route::get('reporte_total', 'ReportesController@total')->name('reporte_total.index');
Route::get('reporte_servicios', 'ReportesController@total_servicios')->name('reporte_servicios.index');
Route::get('consolidado', 'ReportesController@consolidado')->name('consolidado.index');
Route::get('detallado', 'ReportesController@detallado')->name('detallado.index');
Route::get('detalladob', 'ReportesController@detalladob')->name('detalladob.index');
Route::get('detalladoc', 'ReportesController@detalladoc')->name('detalladoc.index');
Route::get('general', 'ReportesController@general')->name('general.index');
Route::post('report/consolidado', 'ReportesController@reportc');
Route::post('report/detallado', 'ReportesController@reportd');
Route::post('report/detalladob', 'ReportesController@reportdb');
Route::post('report/detalladoc', 'ReportesController@reportdc');
Route::post('report/general', 'ReportesController@reportg');
Route::get('produccion_servicios', 'ReportesController@prod_servicios')->name('prod_serv.index');
Route::get('produccion_consultas', 'ReportesController@prod_consultas')->name('prod_cons.index');
Route::get('produccion_sesiones', 'ReportesController@prod_sesiones')->name('prod_ses.index');
Route::get('prod-serv/{id}/{f1}/{f2}', 'ReportesController@prod_servicios_report');
Route::get('prod-sesio/{id}/{f1}/{f2}', 'ReportesController@prod_sesiones_report');
Route::get('prod-cons/{id}/{f1}/{f2}', 'ReportesController@prod_consultas_report');


Route::get('productos', 'ProductosController@index')->name('productos.index');
Route::get('recepcion', 'ProductosController@recepcion')->name('productos.recepcion');
Route::get('obstetra', 'ProductosController@obstetra')->name('productos.obstetra');
Route::get('rayos', 'ProductosController@rayos')->name('productos.rayos');
Route::get('laboratorio-almacen', 'ProductosController@laboratorio')->name('productos.laboratorio');

Route::get('almacen', 'ProductosController@almacen')->name('productos.almacen');


Route::get('consultaproductos', 'ProductosController@consulta');

Route::get('productos-create', 'ProductosController@create')->name('productos.create')->middleware('auth');

Route::post('productos/create', 'ProductosController@store')->middleware('auth');
Route::get('productos-delete-{id}', 'ProductosController@delete')->middleware('auth');
Route::get('productos-edit-{id}', 'ProductosController@edit')->name('productos.edit');
Route::post('productos/edit', 'ProductosController@update');
Route::get('productos/getProducto/{id}', 'ProductosController@getProducto');
Route::get('productos/getProductoAlmacenr/{id}', 'ProductosController@getProductosAlmacenr');
Route::get('productos/getProductoAlmacenl/{id}', 'ProductosController@getProductosAlmacenl');
Route::get('productos/getProductoAlmaceno/{id}', 'ProductosController@getProductosAlmaceno');
Route::get('productos/getProductoAlmacenra/{id}', 'ProductosController@getProductosAlmacenra');
Route::get('productos/getProductoAlmacen/{id}', 'ProductosController@getProductosAlmacen');


Route::get('productosl', 'ProductoslController@index')->name('productosl.index');
Route::get('productosl-create', 'ProductoslController@create')->name('productosl.create')->middleware('auth');
Route::post('productosl/create', 'ProductoslController@store')->middleware('auth');
Route::get('productosl-delete-{id}', 'ProductoslController@delete')->middleware('auth');
Route::get('productosl-edit-{id}', 'ProductoslController@edit')->name('productosl.edit');
Route::post('productosl/edit', 'ProductoslController@update');

Route::get('ingreso-productosl', 'ProductoslController@ingproductosl')->name('ingproductosl.index');
Route::get('ingproductosl-create', 'ProductoslController@ingcreatel')->name('ingproductosl.create')->middleware('auth');
Route::post('ingreso/productosl', 'ProductoslController@storeing');
Route::get('ingreso-reversarl-{id}', 'ProductoslController@reversaring')->middleware('auth');

Route::get('salida-productos', 'ProductoslController@salida')->name('salida.index');
Route::get('salida-create', 'ProductoslController@salidacreate')->name('salida.create')->middleware('auth');
Route::post('salida/productosl', 'ProductoslController@storesal');
Route::get('salida-reversarl-{id}', 'ProductoslController@reversarsal')->middleware('auth');

Route::get('ingreso-productos', 'ProductosController@ingproductos')->name('ingproductos.index');
Route::get('ingproductos-create', 'ProductosController@ingcreate')->name('ingproductos.create')->middleware('auth');
Route::post('ingreso/productos', 'ProductosController@storeing');
Route::get('ingreso-reversar-{id}', 'ProductosController@reversar')->middleware('auth');
Route::get('ingresop-edit-{id}', 'ProductosController@editingreso')->middleware('auth');
Route::post('ingresosp/update', 'ProductosController@updateingreso');
Route::get('ingresos/view/{id}', 'ProductosController@ver')->middleware('auth');

Route::get('almacen-central', 'ProductosController@central')->name('central.index');



Route::get('cierre-caja','CajaController@index')->name('cierre.index')->middleware('auth');
Route::get('cierre-caja-reporte-{fecha}','CajaController@reporte_pdf')->name('cierre.reporte')->middleware('auth');
Route::post('cierre-caja-create','CajaController@create')->name('cierre.create')->middleware('auth');
Route::get('caja-delete-{id}','CajaController@delete');
Route::get('caja-consolidado-{id}','CajaController@consolidado');
Route::get('caja-consolidado2/{id}/{fecha1?}/{fecha2?}','CajaController@consolidado2');
Route::get('caja-ticket-{id}','CajaController@ticket');
Route::get('caja-cerrar-{id}','CajaController@cerrar');
Route::get('saldo/view/{id}', 'CajaController@saldo');

Route::get('visitas', 'VisitadorController@visitas')->name('visitas.index');
Route::get('visitas-create', 'VisitadorController@create_visitas')->name('visitas.create');
Route::post('visitas/guardar', 'VisitadorController@guardar_visitas');
Route::get('visitas-eliminar-{id}','VisitadorController@eliminar');





Route::get('creditos_b', 'CreditosController@creditosb')->name('creditos.b')->middleware('auth');
Route::get('creditos_c', 'CreditosController@creditosc')->name('creditos.c')->middleware('auth');
Route::get('creditos-procesar-{id}','CreditosController@procesar');
Route::get('creditos-reversar-{id}','CreditosController@reversar');

Route::get('gastos_b', 'CreditosController@gastosb')->name('gastos.b')->middleware('auth');
Route::get('gastos_c', 'CreditosController@gastosc')->name('gastos.c')->middleware('auth');
Route::get('gastoss-procesar-{id}','CreditosController@procesarg');
Route::get('gastoss-reversar-{id}','CreditosController@reversarg');
Route::get('gastoss-delete-{id}','CreditosController@deleteg');

Route::get('recetas', 'RecetasController@index')->name('recetas.index');
Route::get('dibujo', 'RecetasController@dibujo')->name('dibujo.index');
Route::get('recetas-create', 'RecetasController@create')->name('recetas.create')->middleware('auth');
Route::post('recetas/create', 'RecetasController@store')->middleware('auth');
Route::get('recetas-delete-{id}', 'RecetasController@delete')->middleware('auth');
Route::get('recetas-edit-{id}', 'RecetasController@edit')->name('recetas.edit');
Route::post('recetas/edit', 'RecetasController@update');
Route::get('recetas-ver-{id}', 'RecetasController@ver');
Route::get('receta-item-delete-{id}', 'RecetasController@deleteItem')->middleware('auth');
Route::get('receta-item-edit-{id}', 'RecetasController@editItem')->name('recetas.edit-item');
Route::post('recitem/update', 'RecetasController@updateItem')->middleware('auth');
Route::get('crear/descanso','RecetasController@descanso');
Route::get('crear/descanso1','RecetasController@descanso1');




Route::get('ordenes', 'OrdenesController@index')->name('ordenes.index');
Route::get('ordenes-create', 'OrdenesController@create')->name('ordenes.create')->middleware('auth');
Route::post('ordenes/create', 'OrdenesController@store')->middleware('auth');
Route::get('ordenes-delete-{id}', 'OrdenesController@delete')->middleware('auth');
Route::get('ordenes-edit-{id}', 'OrdenesController@edit')->name('ordenes.edit');
Route::post('ordenes/edit', 'OrdenesController@update');
Route::get('ordenes-ver-{id}', 'OrdenesController@ver');
Route::get('ordenes-item-edit-{id}', 'OrdenesController@editItem');
Route::get('ordenes-iteml-edit-{id}', 'OrdenesController@editItemL');
Route::get('ordenes-item-delete-{id}', 'OrdenesController@deletes')->middleware('auth');
Route::get('ordenes-iteml-delete-{id}', 'OrdenesController@deletel')->middleware('auth');
Route::post('ordenes/edits', 'OrdenesController@updates');
Route::post('ordenes/editl', 'OrdenesController@updatel');



Route::get('evaluaciones', 'EvaluacionesController@index')->name('evaluaciones.index');
Route::get('evaluaciones-create', 'EvaluacionesController@create')->name('evaluaciones.create')->middleware('auth');
Route::post('evaluaciones/create', 'EvaluacionesController@store')->middleware('auth');
Route::get('evaluaciones-delete-{id}', 'EvaluacionesController@delete')->middleware('auth');
Route::get('evaluaciones-edit-{id}', 'EvaluacionesController@edit')->name('evaluaciones.edit');
Route::post('evaluaciones/edit', 'EvaluacionesController@update');
Route::get('evaluaciones-ver-{id}', 'EvaluacionesController@ver');



Route::get('eva', 'EvaController@index')->name('eva.index');
Route::get('eva-create', 'EvaController@create')->name('eva.create')->middleware('auth');
Route::post('eva/create', 'EvaController@store')->middleware('auth');
Route::get('eva-delete-{id}', 'EvaController@delete')->middleware('auth');
Route::get('eva-edit-{id}', 'EvaController@edit')->name('eva.edit');
Route::post('eva/edit', 'EvaController@update');
Route::get('eva-ver-{id}', 'EvaController@ver');
Route::get('eva/ver/{id}', 'EvaController@ver');

Route::get('documentos', 'DocumentosController@index')->name('documentos.index');
Route::get('documentos-create', 'DocumentosController@create')->name('documentos.create')->middleware('auth');
Route::post('documentos/create', 'DocumentosController@store')->middleware('auth');
Route::get('documentos-delete-{id}', 'DocumentosController@delete')->middleware('auth');
Route::get('documentos-edit-{id}', 'DocumentosController@edit')->name('documentos.edit');
Route::post('documentos/edit', 'DocumentosController@update');
Route::get('documentos-ver-{id}', 'DocumentosController@ver');
Route::get('documentos/ver/{id}', 'DocumentosController@ver');


Route::get('crear/utero1','EvaluacionesController@utero1');
Route::get('crear/utero2','EvaluacionesController@utero2');



Route::get('download2/{filename}', function($filename)
{
    // Check if file exists in 
    $file_path = public_path().'/informes/'. $filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path),
            'Content-Type: ' . mime_content_type($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})->name('descargar2');




Route::get('/solicitudes/dataPacientes/{id}','AtencionesController@datapac');



Route::get('storage/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/storage/'.$archivo;
    //verificamos si el archivo existe y lo retornamos
    if (Storage::exists($archivo))
    {
      return response()->download($url);
    }
    //si no se encuentra lanzamos un error 404.
    abort(404);

});


