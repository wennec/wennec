<?php
//Rutas Super Administrador

Route::resource('usuarios','UserController');
Route::resource('colegios', 'ColegioController');

//Rutas Administrador
Route::resource('usuariosC', 'UsersAdminController');
Route::resource('agendaA', 'AgendaAdminController');
Route::resource('eventoA', 'EventoAdminController');
Route::resource('eventoEstudiante', 'EventoEstudianteController');
Route::resource('agendaEstudiante', 'AgendaEstudianteController');
Route::resource('agendaAcudiente', 'AgendaAcudienteController');
Route::resource('adminStudent', 'AdminStudentController');
Route::resource('adminDocente', 'AdminDocenteController');
Route::resource('horarios', 'AdminHorariosController');

Route::resource('horarioE', 'HorarioStudentController');
Route::resource('calificacionEstudiante', 'CalificacionEstudianteController');
Route::resource('asistenciaEstudiante', 'AsistenciaStudentController');

Route::resource('calificacionDocente', 'CalificacionDocenteController');

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