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
    $app->get('/[{cuisine}]', ['as' => 'recipes.get', 'uses' => 'RecipeController@get']);
    $app->post('/', ['as' => 'recipes.create', 'uses' => 'RecipeController@create']);
    $app->get('/show/{id}', ['as' => 'recipes.show', 'uses' => 'RecipeController@show']);
    $app->put('/{id}', ['as' => 'recipes.update', 'uses' => 'RecipeController@update']);
    $app->put('/rate/{id}', ['as' => 'recipes.rate', 'uses' => 'RecipeController@rate']);
});