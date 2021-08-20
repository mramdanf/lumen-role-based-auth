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

$api = $app->make(Dingo\Api\Routing\Router::class);

$api->version('v1', function ($api) {
    // Login
    $api->post('/auth/login', 'App\Http\Controllers\Auth\AuthController@postLogin');

    // Only for admin
    $api->group([
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['ability:,admin'],
    ], function($api) {
        $api->get('user/list', 'UserController@list');
        $api->post('user/check-ability', 'UserController@checkAbility');
        
        $api->post('role/create', 'EntrustController@createRole');
        $api->get('role/list', 'EntrustController@listRole');
        $api->post('permission/create', 'EntrustController@createPermission');
        $api->get('permission/list', 'EntrustController@listPermission');
        $api->post('assign-user-role', 'EntrustController@assignUserRole');
        $api->post('assign-role-permission', 'EntrustController@assignRolePermission');
    });
    
});
