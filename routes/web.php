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

$app->group(['prefix' => 'recipes/'], function ($app) {
    $app->get('/','RecipeController@get');
    $app->post('/','RecipeController@create');
    $app->get('/{id}', 'RecipeController@show');
    $app->put('/{id}','RecipeController@update');
});