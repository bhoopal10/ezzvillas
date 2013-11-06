<?php

/*
Route_Name                      ControllerAction                           CallType          ReturnType
---------------------------------------------------------------------------------------------------------------
projectImageUpload              admin->uploadProjectImage                   POST

projectAdd                      admin->addProject                           POST



*/

//Route::controller('admin::home');

Route::get('(:bundle)',array('as'=>'home','uses'=>'admin::home@index'));

Route::get('(:bundle)/users',array('as'=>'UserHome','uses'=>'admin::user@index'));
Route::get('(:bundle)/user/add',array('as'=>'UserAdd','uses'=>'admin::user@add_user'));

Route::get('(:bundle)/villa/add',array('as'=>'VillaAdd','uses'=>'admin::project@add_villa'));
Route::post('(:bundle)/villa/save',array('as'=>'VillaSave','uses'=>'admin::project@save_villa'));
Route::get('(:bundle)/villa',array('as'=>'VillaHome','uses'=>'admin::project@home'));

Route::get('(:bundle)/location/getState',array('as'=>'getState','uses'=>'admin::location@states'));
Route::get('(:bundle)/location/add',array('as'=>'LocationAdd','uses'=>'admin::location@add'));
Route::post('(:bundle)/location/SaveState',array('as'=>'StateSave','uses'=>'admin::location@save_state'));
Route::post('(:bundle)/location/SaveCity',array('as'=>'CitySave','uses'=>'admin::location@save_city'));

/*------------------------------------------------------------------------------------------*/


Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});