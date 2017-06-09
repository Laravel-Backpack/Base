<?php

/* To use this file: 
1) in config/backpack/base.php
set to true
'skip_all_backpack_routes' => true,

2) Add to app/Providers/RouteServiceProvider.php

public function map()
{
    $this->mapApiRoutes();

    $this->mapWebRoutes();
    
    $this->mapBackpackRoutes(); // THIS FUNCTION
    
}

protected function mapBackpackRoutes()
{
   Route::middleware('web')
        ->prefix(config('backpack.base.route_prefix', 'admin'))
        ->namespace('Backpack\PermissionManager\app\Http\Controllers')
        ->group(base_path('routes/backpack.php'));
}
*/

//auth
Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

//dashboard
Route::get('dashboard', 'AdminController@dashboard');
Route::get('/', 'AdminController@redirect');


Route::group(['middleware' => 'auth'], function () {
	
	//backupmanager
	Route::get('backup', 'BackupController@index');
	Route::put('backup/create', 'BackupController@create');
	Route::get('backup/download/{file_name?}', 'BackupController@download');
	Route::delete('backup/delete/{file_name?}', 'BackupController@delete')->where('file_name', '(.*)');

	//LangFileManager
	Route::get('language/texts/{lang?}/{file?}', 'LanguageCrudController@showTexts');
	Route::post('language/texts/{lang}/{file}', 'LanguageCrudController@updateTexts');
	Route::resource('language', 'LanguageCrudController');
	
	//permissionmanager
	CRUD::resource('permission', 'PermissionCrudController');
	CRUD::resource('role', 'RoleCrudController');
	CRUD::resource('user', 'UserCrudController');

	//logmanager
	Route::get('log', 'LogController@index');
	Route::get('log/preview/{file_name}', 'LogController@preview');
	Route::get('log/download/{file_name}', 'LogController@download');
	Route::delete('log/delete/{file_name}', 'LogController@delete');

	//menucrud
	CRUD::resource('menu-item', 'MenuItemCrudController');

	//newscrud
	CRUD::resource('article', 'ArticleCrudController');
	CRUD::resource('category', 'CategoryCrudController');
	CRUD::resource('tag', 'TagCrudController');

	//pagemanager
	Route::get('page/create/{template}', 'PageCrudController@create');
	Route::get('page/{id}/edit/{template}', 'PageCrudController@edit');
	Route::get('page/reorder', 'PageCrudController@reorder');
	Route::get('page/reorder/{lang}', 'PageCrudController@reorder');
	Route::post('page/reorder', 'PageCrudController@saveReorder');
	Route::post('page/reorder/{lang}', 'PageCrudController@saveReorder');
	Route::get('page/{id}/details', 'PageCrudController@showDetailsRow');
	Route::get('page/{id}/translate/{lang}', 'PageCrudController@translateItem');
	Route::resource('page', 'PageCrudController');

	// Settings
	Route::resource('setting', 'SettingCrudController');

});

