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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return redirect('/index');
});

Route::get('/index', 'FrontendController@index')->name('index');
Route::get('/detail/category/{id}', 'FrontendController@detailCategory')->name('detail_category');
Route::get('/detail/catalog/{id}', 'FrontendController@detailCatalog')->name('detail_catalog');
Route::get('/detail/catalog/{id}/{val}', 'FrontendController@detailCatalog')->name('detail.val');
Route::get('/filter/{metadata}', 'FrontendController@filter')->name('filter.by');
Route::get('/search', 'FrontendController@search')->name('search');
// Route::get('/item_record/', 'FrontendController@item_record')->name('item_record');




Route::get('/detail/catalog/{id}/{sub}', 'FrontendController@subcollection')->name('subcollection');

Auth::routes(['verify' => true]);
Route::get('/register', function () {
	return redirect('/login');
});
Route::group(['middleware' => ['auth', 'verified']], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['middleware' => 'can:update-profile,id'], function () {
		Route::get('profile/users/{id}', 'UserController@show')->name('profile.show');
		Route::get('profile/users/{id}/edit', 'UserController@edit')->name('profile.edit');
		Route::match(['put', 'patch'], 'profile/users/{id}', 'UserController@update')->name('profile.update');
	});

	Route::group(['middleware' => 'can:isAdmin'], function () {
		Route::resource('users', 'UserController');
		Route::resource('roles', 'RoleController');
		Route::get('news/index', 'NewsController@index')->name('news.index');
		Route::put('news/{id}/edit', 'NewsController@edit')->name('news.edit');
		Route::delete('news/index', 'NewsController@destroy')->name('news.destroy');
		Route::post('news/create', 'NewsController@create')->name('news.create');

		Route::resource('categories', 'CategoryController');
		Route::resource('metadata', 'MetadataController');
		Route::resource('katalogMetadatas', 'KatalogMetadataController');
		Route::put('catalogs/category/{id}', 'CatalogController@updateStatus')->name('catalogs.update_status');
		Route::post('users/import', 'UserController@import')->name('users.import');
	});

	Route::resource('catalogs', 'CatalogController');
	Route::resource('catalogMetadataValues', 'CatalogMetadataValueController');
	Route::get('catalogs/category/{id}', 'CatalogController@indexWithCategory')->name('catalogs.index_with_category');
	Route::get('catalogs/create/category/{id}', 'CatalogController@createWithCategory')->name('catalogs.create_with_category');
	Route::get('report/index', 'ReportController@index')->name('report.index');
});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
