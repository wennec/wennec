<?php
//Rutas Landing
Route::get('/','LandingController@elite');
Route::get('/silver','LandingController@silver');
Route::get('/diamond','LandingController@diamond');
Route::get('/contacto','LandingController@contacto');
Route::get('/planes','LandingController@planes');
//Rutas Super Administrador

Route::resource('usuarios','UserController');
Route::resource('colegios', 'ColegioController');

//Rutas Administrador
Route::resource('usuariosC', 'UsersAdminController');
Route::resource('agendaA', 'AgendaAdminController');
Route::resource('eventoA', 'EventoAdminController');
Route::resource('noticiasA', 'AdminNoticiaController');
Route::resource('fechaevaluaciondocenteA', 'EvaluacionDocenteController');
Route::resource('resultadoevaluaciondocenteA', 'EvaluacionDocenteRController');
Route::resource('eventoEstudiante', 'EventoEstudianteController');
Route::resource('agendaEstudiante', 'AgendaEstudianteController');
Route::resource('agendaAcudiente', 'AgendaAcudienteController');
Route::resource('adminStudent', 'AdminStudentController');
Route::resource('adminDocente', 'AdminDocenteController');
Route::resource('horarios', 'AdminHorariosController');
Route::resource('eleccionEscolar', 'EleccionEscolarController');
Route::resource('eleccionEstudiante', 'EleccionEstudianteController');
Route::resource('eleccionREstudiante', 'EleccionEstudianteRController');
Route::resource('acudienteEstudiante', 'AcudienteEstudianteController');
Route::resource('acudienteEstudianteCalificaciones', 'CalificacionAcudienteController');
Route::prefix('acudienteEstudianteCalificaciones/{id}/{idStudent}')->group(function (){
    Route::get('acudienteEstudianteCalificaciones', 'CalificacionAcudienteController@showCalificaciones')->name('acudienteEstudianteCalificaciones.showCalificaciones');
});
Route::resource('pagosAcudiente', 'PagosAcudienteController');
Route::resource('horarioE', 'HorarioStudentController');
Route::resource('calificacionEstudiante', 'CalificacionEstudianteController');
Route::resource('asistenciaEstudiante', 'AsistenciaStudentController');
Route::resource('evaluacionDocenteE', 'EvaluacionEDocenteController');
Route::resource('observacionDocente', 'ObservacionDocenteController');
Route::prefix('observacionDocente/{id}/{id_materia_show}')->group(function (){
    Route::get('observacionDocente', 'ObservacionDocenteController@show')->name('observacionDocente.show');
});
Route::resource('observacionEstudiante', 'ObservacionEstudianteController');
Route::prefix('observacionEstudiante/{id}/{id_materia}')->group(function (){
    Route::get('observacionEstudiante', 'ObservacionEstudianteController@show')->name('observacionEstudiante.show');
});

Route::resource('observacionAcudiente', 'ObservacionAcudienteController');
Route::prefix('observacionAcudiente/{id_estudiante}/{id_materia}')->group(function (){
    Route::get('observacionAcudiente', 'ObservacionAcudienteController@show_observaciones')->name('observacionAcudiente.show_observaciones');
});


Route::resource('calificacionDocente', 'CalificacionDocenteController');

Route::prefix('/eleccionEstudiante')->group(function (){
    Route::post('/eleccionEstudiante', 'EleccionEstudianteController@storeVotoEstudiante')->name('eleccionEstudiante.storeVotoEstudiante');
});

Route::resource('reportes', 'ReportesController');
Route::name('print')->get('/reportescertificado', 'ReportesController@reporteCertificadoLaboral');
Route::name('print')->get('/reporteshorario', 'ReportesController@reporteHorario');

//Logro
Route::resource('logroDocente', 'LogroController');
Route::prefix('grupoEstudiantes/{id}')->group(function (){
    Route::get('grupoEstudiantes', 'LogroController@show_estudiantes')->name('grupoEstudiantes.show_estudiantes');
});

Route::resource('calificacion', 'CalificacionController');

Route::resource('prematricula', 'PreMatriculaController');

Route::prefix('/perfil')->group(function (){
    Route::get('/', 'PerfilController@index')->name('perfil.index');
    Route::post('/', 'PerfilController@update')->name('perfil.update');
    Route::post('password', 'PerfilController@updatePassword')->name('perfil.password');
    Route::post('foto', 'PerfilController@fotoUp')->name('perfil.foto');
});

Route::prefix('colegios/{colegio}')->group(function () {
    Route::get('actividad','ActividadController@index')->name('actividad.index');
    Route::get('actividades','ActividadController@show')->name('actividad.show');
    Route::any('actividad/create','ActividadController@create')->name('actividad.create');
    Route::any('activida','ActividadController@store')->name('actividad.store');
    Route::delete('actividades','ActividadController@destroy')->name('actividad.destroy');
});

Route::resource('formatos','FormatoController');

//Rutas administrador

Route::resource('admindepto', 'AdmindeptoController');
Route::resource('admintempo', 'AdminActivTempoController');

Route::prefix('admindepto/{departamento}')->group(function () {
    Route::get('admin_actividad','AdminActividadController@index')->name('admin_actividad.index');

    Route::get('admin_actividad','AdminActividadController@show')->name('admin_actividad.show');
});


//Rutas Ayudante

Route::resource('activtemporal', 'AyudActiTempoController');

//Rutas Jefe Dependencia
Route::resource('jefedepto', 'JefedeptoController');

Route::resource('jefeacttemp', 'JefeActTempController');

//Rutas Estadisticas
Route::resource('estadistica', 'EstadisticasController');
