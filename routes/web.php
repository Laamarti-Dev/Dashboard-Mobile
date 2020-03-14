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
    return view('auth.login');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


// ======= Start Dashboard ======= //

/*** Profile ***/
Route::get('/profile', 'ProfileControllers@index')->name('profile');
Route::post('/profile/update', 'ProfileControllers@update')->name('profile.update');



/*** LogOut ***/
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

/*** Console Developer ***/
Route::get('/console/{status?}', 'ConsoleController@index')->name('console');
Route::post('/console/create/{status?}','ConsoleController@store')->name('console.store');
Route::post('/console/update/{status?}','ConsoleController@update')->name('console.update');
Route::post('/console/delete/{status?}','ConsoleController@destroy')->name('console.destroy');
Route::post('/console/accounts/get','ConsoleController@getConsoleById');
Route::post('/console/accounts/application/get','ConsoleController@getAllApplicationInConsole');



/*** Application ***/
Route::get('/application/{status?}','ApplicationController@index')->name('application');
Route::post('/application/create/{status?}','ApplicationController@store')->name('application.store');
Route::post('/application/delete/{status?}','ApplicationController@destroy')->name('application.destroy');
Route::get('/application/about/id/{idApp}/console/{idCon}','ApplicationController@show')->name('application.show');
Route::get('/application/get/data','ApplicationController@getData')->name('application.getData');


/*** Niche ***/
Route::get('/niche/{status?}','NicheControllers@index')->name('niche');
Route::post('/niche/create/{status?}','NicheControllers@store')->name('niche.store');
Route::post('/niche/delete/{status?}','NicheControllers@destroy')->name('niche.destroy');
Route::post('/niche/about/get','NicheControllers@getNicheById');
Route::post('/niche/update/{status?}','NicheControllers@update')->name('niche.update');



/*** Ads Account ***/
Route::get('/adsAccount/{status?}','AdsControllers@index')->name('adsAccount');
Route::post('/adsAccount/create/{status?}','AdsControllers@store')->name('adsAccount.store');
Route::post('/adsAccount/update/{status?}','AdsControllers@update')->name('adsAccount.update');
Route::post('/adsAccount/delete/{status?}','AdsControllers@destroy')->name('adsAccount.destroy');
Route::post('/adsAccount/about/get','AdsControllers@getAdsAccounteById');
Route::post('/adsAccount/get/all','AdsControllers@allApplicationHasAdsInAcc');


/*** My Ads ***/
Route::get('/ads/{status?}','AdsappsController@index')->name('ads');
Route::post('/ads/create/{status?}','AdsappsController@store')->name('ads.store');
Route::post('/ads/update/{status?}','AdsappsController@update')->name('ads.update');
Route::post('/ads/delete/{status?}','AdsappsController@destroy')->name('ads.destroy');
Route::post('/ads/about/get','AdsappsController@getAdsApplicationById');
Route::get('get/json/packagename/{packagename}/ads/{id}','AdsappsController@getAdsForApplication');




/*** Proxy Detection ***/
Route::get('/proxydetection/{status?}','BootHunterControllers@index')->name('proxydetection');
Route::post('/proxydetection/delete/{status?}','BootHunterControllers@destroy')->name('proxydetection.destroy');
Route::get('/proxydetection/hunter/id/{id}','BootHunterControllers@BootHunterIp');


/*** Tools ***/
Route::get('/tools/{status?}','ToolsControllers@index')->name('tools');
Route::post('/tools/update/{status?}','ToolsControllers@update')->name('tools.update');


// ======= End Dashboard ======= //




