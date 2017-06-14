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

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->post('/members','MembersController@lists');
$app->put('/members','MembersController@create');
$app->get('/members/{id}','MembersController@show');
$app->patch('/members/{id}','MembersController@update');
$app->delete('/members/{id}','MembersController@delete');
