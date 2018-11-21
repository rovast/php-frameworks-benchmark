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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->get('api/hello', 'ApiController@hello');
$router->get('api/db', 'ApiController@db');
$router->get('api/setRedis', 'ApiController@setRedis');
$router->get('api/redis', 'ApiController@redis');
