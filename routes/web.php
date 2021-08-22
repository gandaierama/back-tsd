<?php

/**
 * @var $router \Laravel\Lumen\Routing\Router
 */

$router->group([
    'prefix'     => 'api',
    'middleware' => ['auth', 'permission']
], function () use ($router) {
    $router->post('/login', 'LoginController@login');
    $router->post('/logout', 'LoginController@logout');

    $router->get('/admins', 'AdminController@list');
    $router->addRoute(['GET', 'POST'], '/admins/create', 'AdminController@create');
    $router->addRoute(['GET', 'POST'], '/admins/update', 'AdminController@update');
    $router->post('/admins/delete', 'AdminController@delete');
    $router->get('/admins/info', 'AdminController@info');
    $router->post('/admins/reset-password', 'AdminController@resetPassword');
    $router->post('/admins/update-password', 'AdminController@updatePassword');

    $router->get('/roles', 'RoleController@list');
    $router->addRoute(['GET', 'POST'], '/roles/create', 'RoleController@create');
    $router->addRoute(['GET', 'POST'], '/roles/update', 'RoleController@update');
    $router->post('/roles/delete', 'RoleController@delete');

    $router->get('/permissions', 'PermissionController@list');
    $router->addRoute(['GET', 'POST'], '/permissions/create', 'PermissionController@create');
    $router->addRoute(['GET', 'POST'], '/permissions/update', 'PermissionController@update');
    $router->post('/permissions/delete', 'PermissionController@delete');

    $router->post('/upload/file', 'UploadController@file');
});


// $router->group([
//     'middleware' => ['auth']
// ], function () use ($router) { 
    $router->get('/', function () {
        return view('app');
    });

    $router->get('/parceiros', 'ParceirosController@listView');
    $router->post('/api/parceiros', 'ParceirosController@create');
    $router->post('/api/parceiros/delete/{id}', 'ParceirosController@delete');

    $router->get('/login', function () {
        return view('login');
    });

    $router->get('/users', function () {
        return view('users');
    });

    $router->get('/orders', function () {
        return view('orders');
    });

    $router->get('/acompanhamento', function () {
        return view('acompanhamento');
    });
// }

$router->get('/login', function () {
        return view('login');
    });
