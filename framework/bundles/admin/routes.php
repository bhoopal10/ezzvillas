<?php

/*
Route_Name                      ControllerAction                           CallType          ReturnType
---------------------------------------------------------------------------------------------------------------
projectImageUpload              admin->uploadProjectImage                   POST

projectAdd                      admin->addProject                           POST



*/



//Route::controller('admin::home');



Route::get('(:bundle)',array('as'=>'login',function(){
    if(Auth::check())
    {
        return Redirect::to_route('home1');
    }
    return View::make('admin::user.login');
}));

Route::post('(:bundle)/login-validate',array('as'=>'LoginValidate','uses'=>'admin::user@login'));




Route::get('(:bundle)/dashboard',array('as'=>'home1','uses'=>'admin::home@index'));

Route::get('(:bundle)/users',array('as'=>'UserHome','uses'=>'admin::user@index'));
Route::get('(:bundle)/user/add',array('as'=>'UserAdd','uses'=>'admin::user@add_user'));
Route::post('(:bundle)/user/adduser',array('as'=>'AddUser','uses'=>'admin::user@add_user'));
Route::get('(:bundle)/user/getuser',array('as'=>'GetUser','uses'=>'admin::user@getuser'));

Route::get('(:bundle)/villa/add',array('as'=>'VillaAdd','uses'=>'admin::project@add_villa'));
Route::post('(:bundle)/villa/save',array('as'=>'VillaSave','uses'=>'admin::project@save_villa'));
Route::get('(:bundle)/villa',array('as'=>'VillaHome','uses'=>'admin::project@home'));
Route::get('(:bundle)/villa/edit/(:any)',array('as'=>'EditVilla','uses'=>'admin::project@home'));
Route::get('(:bundle)/villa/villa-album',array('as'=>'VillaAlbum','uses'=>'admin::project@villaAlbum'));
Route::post('(:bundle)/villa/villa-album/(:any)',array('as'=>'ViewVillaAlbum','uses'=>'admin::project@viewVillaAlbum'));



    Route::get('(:bundle)/location/getState',array('as'=>'getState','uses'=>'admin::location@states'));
    Route::get('(:bundle)/location/add',array('as'=>'LocationAdd','uses'=>'admin::location@add'));
    Route::post('(:bundle)/location/SaveState',array('as'=>'StateSave','uses'=>'admin::location@save_state'));
    Route::post('(:bundle)/location/SaveCity',array('as'=>'CitySave','uses'=>'admin::location@save_city'));
    Route::get('(:bundle)/location/ViewLocation',array('as'=>'LocationView','uses'=>'admin::location@view_location'));
    Route::get('(:bundle)/location/EditLocation/(:any)',array('as'=>'EditLocation','uses'=>'admin::location@edit_location'));
    Route::get('(:bundle)/location/EditState/(:any)',array('as'=>'EditState','uses'=>'admin::location@edit_state'));

    Route::get('(:bundle)/gallery/add',array('as'=>'ImageAdd','uses'=>'admin::image@addimage'));
    Route::post('(:bundle)/gallery/addimage',array('as'=>'AddImage','uses'=>'admin::image@addimage'));
    Route::get('(:bundle)/gallery/editimage/(:any)',array('as'=>'EditImage','uses'=>'admin::image@editimage'));
    Route::get('(:bundle)/gallery/create-album',array('as'=>'CreateAlbum','uses'=>'admin::image@createAlbum'));
    Route::post('(:bundle)/gallery/save-album',array('as'=>'SaveAlbum','uses'=>'admin::image@saveAlbum'));
    Route::post('(:bundle)/gallery/upload-album-image',array('as'=>'UploadAlbumImage','uses'=>'admin::image@upload_album_image'));
    Route::post('(:bundle)/gallery/update-image-data',array('as'=>'UpdateImageData','uses'=>'admin::image@update_image_data'));
    Route::get('(:bundle)/gallery/view-album',array('as'=>'ViewAlbum','uses'=>'admin::image@view_album'));
    Route::get('(:bundle)/gallery/display-album-image/(:any)',array('as'=>'DisplayAlbumImage','uses'=>'admin::image@displayAlbumImage'));
    Route::get('(:bundle)/gallery/Edit-album-image/(:any)',array('as'=>'EditAlbumImage','uses'=>'admin::image@editAlbumImage'));
    Route::post('(:bundle)/gallery/Edit-image-data',array('as'=>'EditImageData','uses'=>'admin::image@editImageData'));
    Route::get('(:bundle)/gallery/Delete-image/(:any)/(:any)',array('as'=>'DeleteImage','uses'=>'admin::image@deleteImage'));
    Route::get('(:bundle)/gallery/Delete-album/(:any)',array('as'=>'DeleteAlbum','uses'=>'admin::image@deleteAlbum'));


    Route::get('(:bundle)/vacation/vacation_category',array('as'=>'vacation_category','uses'=>'admin::Vacation@vacation_category'));
    Route::post('(:bundle)/vacation/add_category',array('as'=>'AddCategory','uses'=>'admin::Vacation@add_category'));
    Route::post('(:bundle)/vacation/addsub_cat',array('as'=>'AddSubCat','uses'=>'admin::Vacation@addsub_cat'));

    Route::get('(:bundle)/posts/addposts',array('as'=>'Posts','uses'=>'admin::posts@addposts'));
    Route::post('(:bundle)/posts/update',array('as'=>'UpdatePosts','uses'=>'admin::posts@updateposts'));




Route::get('logout', array('as' => 'logout', function () {

    Auth::logout();

    return Redirect::route('login');
}));


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
/|--------------------------------------------------------------------------
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
    if (Auth::guest()) return Response::error('500');
});