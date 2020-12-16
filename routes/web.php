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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', function () {
    return \Illuminate\Support\Str::random(32);
});

$router->post('/login', 'UsersController@login');
$router->post('/users', 'UsersController@create');
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/users', 'UsersController@index');
    $router->get('/users/logout', 'UsersController@logout');
    $router->get('/users/{id}', 'UsersController@show');
    $router->put('/users/{id}', 'UsersController@edit');
    $router->delete('/users/{id}', 'UsersController@delete');

    //routing menus
    $router->get('/menu', 'MenusController@index');
    $router->post('/createMenu', 'MenusController@create');
    $router->get('/viewData/{id}', 'MenusController@view');
    $router->put('/updateData/{id}', 'MenusController@update');
    $router->delete('/hapusData/{id}', 'MenusController@delete');

    //routing categorizes
    $router->post('/categorizes', 'CategorizesController@create');
    $router->put('/categorizes/{id}', 'CategorizesController@edit');
    $router->delete('/categorizes/{id}', 'CategorizesController@delete');

    //routing Contract Types
    $router->post('/contract-type', 'ContractTypesController@create');
    $router->put('/contract-type/{id}', 'ContractTypesController@edit');
    $router->delete('/contract-type/{id}', 'ContractTypesController@delete');

    //routing Educations

    $router->post('/educations', 'EducationsController@create');
    $router->put('/educations/{id}', 'EducationsController@edit');
    $router->delete('/educations/{id}', 'EducationsController@delete');

    //routing Language

    $router->post('/languages', 'LanguagesController@create');
    $router->put('/languages/{id}', 'LanguagesController@edit');
    $router->delete('/languages/{id}', 'LanguagesController@delete');

    //routing Location

    $router->post('/location', 'LocationsController@create');
    $router->put('/location/{id}', 'LocationsController@edit');
    $router->delete('/location/{id}', 'LocationsController@delete');

    //routing Major
    $router->post('/major', 'MajorsController@create');
    $router->put('/major/{id}', 'MajorsController@edit');
    $router->delete('/major/{id}', 'MajorsController@delete');

    //routing Position

    $router->post('/position-category', 'PositionCategoriesController@create');
    $router->put('/position-category/{id}', 'PositionCategoriesController@edit');
    $router->delete('/position-category/{id}', 'PositionCategoriesController@delete');

    $router->post('/opportunity', 'OpportunitiesController@create');
    $router->put('/opportunity/{id}', 'OpportunitiesController@edit');
    $router->delete('/opportunity/{id}', 'OpportunitiesController@delete');
});

//routing Users
// $router->get('/users', 'UsersController@index');
// $router->get('/users/{id}', 'UsersController@show');
// $router->post('/users', 'UsersController@create');
// $router->put('/users/{id}', 'UsersController@edit');
// $router->delete('/users/{id}', 'UsersController@delete');
//routing opportunities
$router->get('/opportunity', 'OpportunitiesController@index');
$router->get('/opportunity/{id}', 'OpportunitiesController@show');

$router->get('/major', 'MajorsController@index');
$router->get('/major/{id}', 'MajorsController@show');

$router->get('/languages', 'LanguagesController@index');
$router->get('/languages/{id}', 'LanguagesController@show');

$router->get('/categorizes', 'CategorizesController@index');
$router->get('/categorizes/{id}', 'CategorizesController@show');

$router->get('/contract-type', 'ContractTypesController@index');
$router->get('/contract-type/{id}', 'ContractTypesController@show');

$router->get('/educations', 'EducationsController@index');
$router->get('/educations/{id}', 'EducationsController@show');

$router->get('/location', 'LocationsController@index');
$router->get('/location/{id}', 'LocationsController@show');

$router->get('/position-category', 'PositionCategoriesController@index');
$router->get('/position-category/{id}', 'PositionCategoriesController@show');

$router->post('/companies', 'CompaniesController@store');
$router->get('/companies', 'CompaniesController@index');
$router->get('/companies/{id}', 'CompaniesController@show');
$router->put('/companies/{id}', 'CompaniesController@update');
$router->delete('/companies/{id}', 'CompaniesController@destroy');
