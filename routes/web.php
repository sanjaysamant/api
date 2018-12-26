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

$router->get('/dashboard', function () use ($router) {
    return $router->app->version();
});

//Dashboard Group Routes
$router->group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function() use ($router)
{
	//Continent routes
    $router->get('/continent', 'ContinentsController@index');
    $router->post('/continent/store', 'ContinentsController@store');
    $router->get('/continent/show/{id}', 'ContinentsController@show');
    $router->put('/continent/update/{id}', 'ContinentsController@update');
	//Countries routes
    $router->get('/country', 'CountriesController@index');
    $router->post('/country/store', 'CountriesController@store');
    $router->get('/country/show/{id}', 'CountriesController@show');
    $router->put('/country/update/{id}', 'CountriesController@update');
    $router->get('/continents', 'CountriesController@getAllContinents');

	//Cities routes
    $router->get('/city', 'CitiesController@index');
    $router->post('/city/store', 'CitiesController@store');
    $router->get('/city/show/{id}', 'CitiesController@show');
    $router->put('/city/update/{id}', 'CitiesController@update');
    $router->get('/all_continents', 'CitiesController@getAllContinents');

});