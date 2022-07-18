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

$router->post('/product/save','ProductController@create');
$router->get('/product/all','ProductController@index');
$router->get('/product/{id}','ProductController@detailProduct');
$router->put('/product/update/{id}','ProductController@updateDataProduct');
$router->delete('/product/delete/{id}','ProductController@pureDeleteProduct');
$router->post('/product/act/delete/{id}','ProductController@actualyDeleteProduct');
