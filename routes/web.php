<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'GetIpController@index');
Route::get('get_ip', 'GetIpController@getIP');
Route::get('get_browser', 'GetIpController@getBrowser');
Route::get('get_all', 'GetIpController@getAll');
Route::get('get_help', 'GetIpController@getHelp');

// Display my own messages when an error occurs
// See in /resources/views/errors/404.blade.php
// Following function can be placed in the boot function of AppServiceProvider (or create another provider)
view()->composer('errors.404', function($view)
{
    $base_url = url('/');        // Get our base url
    $message = "Something's wrong here !";
    $message_link = "Get help with <a href=\"" . $base_url . "/get_help\">" . $base_url . "/get_help</a>";
    // Send my messages to the view
    $view->with('message', $message)
         ->with('message_link', $message_link);
});
