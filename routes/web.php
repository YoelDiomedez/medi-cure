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

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group( function () {

/**
 * MODULO
 * ADMINSION
 */
    // Inicio
    Route::get('/home', 'HomeController@index')->name('home')->middleware('permission:home index');
    Route::get('/api/triages', 'HomeController@triages')->name('home.triages')->middleware('permission:home triages');
    Route::get('/api/attentions', 'HomeController@attentions')->name('home.attentions')->middleware('permission:home attentions');

    // Pacientes
    Route::get('/patients', 'PatientController@index')->name('patients.index')->middleware('permission:patients index');
    Route::post('/patients', 'PatientController@store')->name('patients.store')->middleware('permission:patients store');
    Route::put('/patients/{patient}', 'PatientController@update')->name('patients.update')->middleware('permission:patients update');
    Route::delete('/patients/{patient}', 'PatientController@destroy')->name('patients.destroy')->middleware('permission:patients destroy');
    Route::get('/api/patients', 'PatientController@get')->name('patients.get')->middleware('permission:patients get');
    Route::get('/api/patients/{patient}', 'PatientController@show')->name('patients.show')->middleware('permission:patients show');
    
    // Historial Médico y reportes PDF Historia Clínica y Receta Médica
    Route::get('/histories', 'HistoryController@index')->name('histories.index')->middleware('permission:histories index');
    Route::get('/records/{attention}', 'HistoryController@record')->name('histories.record')->middleware('permission:histories record');
    Route::get('/prescriptions/{attention}', 'HistoryController@prescription')->name('histories.prescription')->middleware('permission:histories prescription');

    // Atenciones
    Route::get('/attentions', 'AttentionController@index')->name('attentions.index')->middleware('permission:attentions index');
    Route::post('/attentions', 'AttentionController@store')->name('attentions.store')->middleware('permission:attentions store');
    Route::put('/attentions/{attention}', 'AttentionController@update')->name('attentions.update')->middleware('permission:attentions update');
    Route::delete('/attentions/{attention}', 'AttentionController@destroy')->name('attentions.destroy')->middleware('permission:attentions destroy');

    
/**
 * MODULO
 * CLINICA
 */    
    // Triajes
    Route::get('/triages', 'TriageController@index')->name('triages.index')->middleware('permission:triages index');
    Route::put('/triages/{triage}', 'TriageController@update')->name('triages.update')->middleware('permission:triages update');

    // Historias Clínicas
    Route::get('/records', 'RecordController@index')->name('records.index')->middleware('permission:records index');
    Route::put('/records/{record}', 'RecordController@update')->name('records.update')->middleware('permission:records update');

/**
 * MODULO
 * INFORME
 */
    // Informes Quirúrgicos
    Route::get('/surgeries', 'SurgeryController@index')->name('surgeries.index')->middleware('permission:surgeries index');
    Route::post('/surgeries', 'SurgeryController@store')->name('surgeries.store')->middleware('permission:surgeries store');
    Route::get('/surgeries/{surgery}', 'SurgeryController@show')->name('surgeries.show')->middleware('permission:surgeries show');
    Route::put('/surgeries/{surgery}', 'SurgeryController@update')->name('surgeries.update')->middleware('permission:surgeries update');
    Route::delete('/surgeries/{surgery}', 'SurgeryController@destroy')->name('surgeries.destroy')->middleware('permission:surgeries destroy');

    // Informes de Laboratoriales
    Route::get('/labs', 'LabController@index')->name('labs.index')->middleware('permission:labs index');
    Route::post('/labs', 'LabController@store')->name('labs.store')->middleware('permission:labs store');
    Route::get('/labs/{lab}', 'LabController@show')->name('labs.show')->middleware('permission:labs show');
    Route::put('/labs/{lab}', 'LabController@update')->name('labs.update')->middleware('permission:labs update');
    Route::delete('/labs/{lab}', 'LabController@destroy')->name('labs.destroy')->middleware('permission:labs destroy');

/**
 * MODULO
 * MANTENIMIENTO
 */ 
    // Accesos
    Route::get('/roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles index');
    Route::post('/roles', 'RoleController@store')->name('roles.store')->middleware('permission:roles store');
    Route::put('/roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles update');
    Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles destroy');
    Route::get('/api/roles', 'RoleController@get')->name('roles.get')->middleware('permission:roles get');
    Route::get('/api/roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles show');

    // Servicios
    Route::get('/services', 'ServiceController@index')->name('services.index')->middleware('permission:services index');
    Route::post('/services', 'ServiceController@store')->name('services.store')->middleware('permission:services store');
    Route::put('/services/{service}', 'ServiceController@update')->name('services.update')->middleware('permission:services update');
    Route::delete('/services/{service}', 'ServiceController@destroy')->name('services.destroy')->middleware('permission:services destroy');
    Route::get('/api/services', 'ServiceController@get')->name('services.get')->middleware('permission:services get');
    Route::get('/api/services/{service}', 'ServiceController@show')->name('services.show')->middleware('permission:services show');

    // Diagnósticos
    Route::get('/diagnoses', 'DiagnosisController@index')->name('diagnoses.index')->middleware('permission:diagnoses index');
    Route::post('/diagnoses', 'DiagnosisController@store')->name('diagnoses.store')->middleware('permission:diagnoses store');
    Route::put('/diagnoses/{diagnosis}', 'DiagnosisController@update')->name('diagnoses.update')->middleware('permission:diagnoses update');
    Route::delete('/diagnoses/{diagnosis}', 'DiagnosisController@destroy')->name('diagnoses.destroy')->middleware('permission:diagnoses destroy');
    Route::get('/api/diagnoses', 'DiagnosisController@get')->name('diagnoses.get')->middleware('permission:diagnoses get');
    Route::get('/api/diagnoses/{diagnosis}', 'DiagnosisController@show')->name('diagnoses.show')->middleware('permission:diagnoses show');
    Route::patch('/diagnoses/{id}', 'DiagnosisController@reinstate')->name('diagnoses.reinstate')->middleware('permission:diagnoses destroy');

    // Especialistas
    Route::get('/users', 'UserController@index')->name('users.index')->middleware('permission:users index');
    Route::post('/users', 'UserController@store')->name('users.store')->middleware('permission:users store');
    Route::put('/users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users destroy');
    Route::get('/api/users', 'UserController@get')->name('users.get')->middleware('permission:users get');
    Route::get('/api/users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users show');
    
    Route::get('audits', 'AuditController@index')->name('audits.index')->middleware('role:Super Admin');
});