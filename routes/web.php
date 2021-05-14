<?php

Route::redirect('/', '/' . locale()->current(), 301);


Route::group(['prefix' => '{locale}', 'where' => ['locale', '[a-zA-Z]{2}']], function () {
    Auth::routes();

    // INSTANTIATE AUTH ROUTING AND ESTABLISH LOGOUT ROUTE
    Route::get('/logout', 'Auth\LoginController@logout');

    // PUBLIC HOMEPAGE ROUTE
    Route::get('/', 'HomeController@index');

    // USER HOMEPAGE ROUTE
    Route::get('/home', 'HomeController@index');

    // USER TASKS ROUTES
    Route::resource('/tasks', 'TasksController');
    Route::get('/tasks-all', 'TasksController@index_all');
    Route::get('/tasks-complete', 'TasksController@index_complete');
    Route::get('/tasks-incomplete', 'TasksController@index_incomplete');
});
