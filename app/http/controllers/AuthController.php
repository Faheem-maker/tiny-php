<?php

namespace app\http\controllers;

use app\http\models\User;
use framework\web\request\Request;

class AuthController {
    public function register() {
        return view();
    }

    public function store(Request $request) {
        $user = User::from($request->post());

        if ($user->validate()) {
            $user->save();
        }
        else {
            var_dump($user->errors);
            exit();
        }

        return response()->redirect(app()->url->named('auth.login'));
    }

    public function login() {
        return view();
    }

    public function validate(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($request->post('email'), 'email');

        if (password_verify($request->post('password'), $user->password)) {
            app()->session->set('user', $user->id);
            return response()->redirect('/');
        }
        return view('auth.login', [
            'user' => $user,
        ]);
    }

    public function logout() {
        app()->session->unset();

        return response()->redirect('/');
    }
}