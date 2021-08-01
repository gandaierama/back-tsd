<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {
	$app=$router;


    //Clientes Contratantes
    $app->get('clientes', 'ClientesController@list');
    $app->get('cliente/{id}', 'ClientesController@create');
    $app->post('cliente/{id}', 'ClientesController@get');
    $app->post('cliente-edit/{id}', 'ClientesController@edit');
    $app->put('cliente/{id}', 'ClientesController@update');
    $app->delete('cliente/{id}', 'ClientesController@delete');
    $app->delete('cliente/login', 'ClientesController@login');

    //Motoboys
    $app->get('parceiros', 'ParceirosController@list');
    $app->get('parceiros/{id}', 'ParceirosController@create');
    $app->post('parceiros/{id}', 'ParceirosController@get');
    $app->post('parceiros-edit/{id}', 'ParceirosController@edit');
    $app->put('parceiros/{id}', 'ParceirosController@update');
    $app->delete('parceiros/{id}', 'ParceirosController@delete');
    $app->delete('parceiros/login', 'ParceirosController@login');


    //Administradores
    $app->get('usuarios', 'UsuariosController@list');
    $app->post('usuarios', 'UsuariosController@create');
    $app->get('usuarios/{id}', 'UsuariosController@get');
    $app->post('usuarios-edit/{id}', 'UsuariosController@edit');
    $app->put('usuarios/{id}', 'UsuariosController@update');
    $app->delete('usuarios/{id}', 'UsuariosController@delete');

    //Ordens de serviço
    $app->get('pedidos', 'PedidosController@list');
    $app->get('pedidos/{id}', 'PedidosController@create');
    $app->post('pedidos/{id}', 'PedidosController@get');
    $app->post('pedidos/{id}', 'PedidosController@edit');
    $app->put('pedidos-edit/{id}', 'PedidosController@update');
    $app->put('pedidos-track/{id}', 'PedidosController@track');
    $app->delete('pedidos/{id}', 'PedidosController@delete');
    $app->post('pedidos/pagar/{id}', 'PedidosController@pagar');
    $app->post('pedidos/map/{id}', 'PedidosController@map');
    $app->post('pedidos/cancelar/{id}', 'PedidosController@cancelar');



});
