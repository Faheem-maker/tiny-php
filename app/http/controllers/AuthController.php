<?php

namespace app\http\controllers;

use app\http\models\LoginModel;
use app\http\models\User;
use app\http\services\AuthService;
use framework\web\request\Request;

class AuthController {
    public function register() {
        return view()->with('user', new User());
    }

    public function store(Request $request) {
        $user = User::from($request->post());

        
        if ($user->validate()) {
            $user->password = password_hash($user->password, PASSWORD_DEFAULT);
            $user->save();
        }
        else {
            var_dump($user->errors);
            exit();
        }

        return response()->redirect(app()->url->named('auth.login'));
    }

    public function login() {
        return view()->with('model', new LoginModel());
    }

    public function authenticate(Request $request) {
        $model = LoginModel::from($request->post());

        if (!$model->validate()) {
            return view('auth.login', [
                'model' => $model,
            ]);
        }

        if (!AuthService::authenticate($model)) {
            return view('auth.login', [
                'model' => $model,
            ]);
        }

        return response()->redirect('/');
    }

    public function logout() {
        app()->session->unset();

        return response()->redirect('/');
    }
}