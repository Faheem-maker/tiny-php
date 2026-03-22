<?php

namespace app\http\middleware;

use app\http\models\User;
use Exception;
use framework\web\request\Request;

class Auth {
    public function handle($next, Request $request) {
        $user = app()->session->get('user');
        if (empty($user)) {
            return response()->redirect(app()->url->named('auth.login'));
        }

        $user = User::find($user);
        $request->put('user', $user);
        
        return $next();
    }
}