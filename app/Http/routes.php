<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
| Dingo API routes
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\API\Controllers', 'middleware' => 'cors'], function ($api) {

    // Auth routes
    $api->group(['prefix' => 'auth'], function($api){
        $api->post('login',    ['as' => 'auth.login', 'uses' => 'AuthController@login']);
        $api->post('signup',   ['as' => 'auth.signup', 'uses' =>'AuthController@signup']);
        $api->post('recovery', ['as' => 'auth.recovery', 'uses' =>'AuthController@recovery']);
        $api->post('reset',    ['as' => 'auth.reset', 'uses' =>'AuthController@reset']);
    });

    // protected route group
    $api->group(['middleware' => ['api.auth']], function ($api) {

        $api->get('protected', function () {
            return ['Welcome Mr. Bond, Only you can access this protected route.'];
        });

    });

    // public route
    $api->get('free', function() {
        return ['Welcome Guest, Its a public route'];
    });
});

// General non api routes
Route::get('/', function () {
    return view('welcome');
});
