<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->post('role/create', 'EntrustController@createRole');
$app->get('role/list', 'EntrustController@listRole');
$app->post('permission/create', 'EntrustController@createPermission');
$app->get('permission/list', 'EntrustController@listPermission');
$app->post('assign-user-role', 'EntrustController@assignUserRole');
$app->post('assign-role-permission', 'EntrustController@assignRolePermission');
$app->get('user/list', 'UserController@list');
$app->post('user/check-ability', 'UserController@checkAbility');

$api = $app->make(Dingo\Api\Routing\Router::class);

$api->version('v1', function ($api) {

    // Auth JWT
    $api->post('/auth/login', [
        'as' => 'api.auth.login',
        'uses' => 'App\Http\Controllers\Auth\AuthController@postLogin',
    ]);
    $api->group([
        'namespace' => 'App\Http\Controllers\Auth',
        'middleware' => 'api.auth'
    ], function ($api) {
        $api->get('/auth/user', 'AuthController@getUser');
        $api->patch('/auth/refresh', 'AuthController@patchRefresh');
        $api->delete('/auth/invalidate', 'AuthController@deleteInvalidate');
    });


    // API
    $api->group([
        'namespace' => 'App\Http\Controllers',
        'middleware' => 'api.auth',
    ], function ($api) {
        $api->get('/', 'APIController@getIndex');
    });
});
