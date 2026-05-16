<?php

use app\http\controllers\AuthController;
use app\http\middleware\Auth;
use framework\web\Routes;

/**
 * Built-in Routes
 * 
 * These routes are essential to many built-in features like authentication.
 * 
 * You can safely remove them or leave them depending upon your usecase.
 */

Routes::group('/auth', function () {
    Routes::get('/register', [AuthController::class, 'register'], 'auth.register');
    Routes::get('/login', [AuthController::class, 'login'], 'auth.login');
    Routes::post('/store', [AuthController::class, 'store'], 'auth.store');
    Routes::post('/', [AuthController::class, 'authenticate'], 'auth.validate');
    Routes::get('/logout', [AuthController::class, 'logout'])->middleware(Auth::class);
});

Routes::get('/media/{path}', 'FileController@index');

/**
 * Add Routes here
 * 
 * Example:
 * Routes::get('/', 'HomeController@index');
 */
Routes::get('/', function () {
    return view('welcome');
});