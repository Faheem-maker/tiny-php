<?php

namespace app\http\services;

use app\http\models\LoginModel;
use app\http\models\User;

class AuthService {
    public static function authenticate(LoginModel $model) {
        $user = User::find($model->email, 'email');

        if (empty($user)) {
            $model->error('email', 'Invalid credentials');
            return false;
        }

        if (!password_verify($model->password, $user->password)) {
            $model->error('email', 'Invalid credentials');
            return false;
        }

        return true;
    }
}