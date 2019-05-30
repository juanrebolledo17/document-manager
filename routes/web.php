<?php

use App\Http\Controllers\LanguageController;
use App\User;
use App\Mail\DocumentUploaded;
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
    return redirect()->route('admin.dashboard');
});

Auth::routes();

Route::get('/inicio', 'DashboardController@index')->name('admin.dashboard');
Route::get('lang/{lang}', 'LanguageController@swap');

Route::group(['middleware' => 'auth'], function() {

	/*
	 * Documents Management
	 */
	Route::group(['prefix' => 'documentos', 'namespace' => 'Documents'], function() {
		Route::get('/', 'DocumentsController@index')->name('documents-index');
		Route::get('/subidos', 'DocumentsController@uploads')->name('documents-uploads');
		Route::get('/descargados', 'DocumentsController@downloads')->name('documents-downloads');
		Route::get('/subir', 'DocumentsController@uploadDocument')->name('upload-document');

		Route::post('/subir', 'DocumentsController@store')->name('document.store');

		Route::delete('/borrar', 'DocumentsController@deleteDocument')->name('delete-document');

		Route::get('/descargar', 'DocumentsController@downloadDocument')->name('download-document');

		Route::get('/buscar', 'DocumentsController@searchDocuments')->name('search-documents');
	});

	/*
	 * Roles Management
	 */
	Route::group(['namespace' => 'Roles'], function() {
		Route::get('roles', 'RoleController@index')->name('roles.index');

	  Route::get('roles/crear', 'RoleController@create')->name('role.create');
	  Route::post('roles/guardar', 'RoleController@store')->name('role.store');

	  Route::group(['prefix' => 'roles/{role}'], function () {
	    Route::get('editar', 'RoleController@edit')->name('role.edit');
	    Route::patch('/', 'RoleController@update')->name('role.update');
	    Route::delete('/', 'RoleController@destroy')->name('role.destroy');
	  });
	});

	/*
	 * Users Management
	 */
	Route::resource('users', 'UsersController');


	/*
	 * Events Management
	 */
	Route::group(['prefix' => 'eventos', 'namespace' => 'Events'], function() {
		Route::resource('events', 'EventsController');
	});

});

Route::get('/preview', function() {
	$user = auth()->user();

	return new DocumentUploaded($user);
});

Route::get('/js/lang.js', function () {
    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');




