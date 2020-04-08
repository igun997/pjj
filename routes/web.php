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

// List Strict
// - manage_users
// - manage_questions
// - manage_theory
// - manage_lectures
// - manage_classes
// - is_student
// - is_teacher
// - is_admin


$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group([
    'prefix' => 'auth'
], function ($router) {

    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@register');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->get('me', 'AuthController@me');


});

$router->group([
    'middleware'=>"strict:is_admin",
    'prefix' => 'master'
], function ($router) {

    $router->get('roles', 'MasterControl@roles_read');
    $router->post('roles', 'MasterControl@roles_add');
    $router->put('roles', 'MasterControl@roles_update');

});

$router->group([
    'prefix' => 'lecture'
], function ($router) {

});

$router->group([
    'prefix' => 'quiz'
], function ($router) {

});

$router->group([
    'prefix' => 'statistic'
], function ($router) {

});
