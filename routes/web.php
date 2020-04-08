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

    $router->get('users', 'MasterControl@users_read');
    $router->post('users', 'MasterControl@users_add');
    $router->put('users', 'MasterControl@users_update');
    $router->delete('users', 'MasterControl@users_delete');

    $router->get('classes', 'MasterControl@classes_read');
    $router->post('classes', 'MasterControl@classes_add');
    $router->put('classes', 'MasterControl@classes_update');
    $router->delete('classes', 'MasterControl@classes_delete');

    $router->get('lectures', 'MasterControl@lectures_read');
    $router->post('lectures', 'MasterControl@lectures_add');
    $router->put('lectures', 'MasterControl@lectures_update');
    $router->delete('lectures', 'MasterControl@lectures_delete');

    $router->get('roles_assign', 'MasterControl@roles_users_read');
    $router->post('roles_assign', 'MasterControl@roles_users_add');
    $router->put('roles_assign', 'MasterControl@roles_users_update');
    $router->delete('roles_assign', 'MasterControl@roles_users_delete');

    $router->get('classes_manager', 'MasterControl@classes_manager_read');
    $router->post('classes_manager', 'MasterControl@classes_manager_add');
    $router->put('classes_manager', 'MasterControl@classes_manager_update');
    $router->delete('classes_manager', 'MasterControl@classes_manager_delete');

    $router->get('lectures_teacher', 'MasterControl@lectures_teacher_read');
    $router->post('lectures_teacher', 'MasterControl@lectures_teacher_add');
    $router->put('lectures_teacher', 'MasterControl@lectures_teacher_update');
    $router->delete('lectures_teacher', 'MasterControl@lectures_teacher_delete');

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
