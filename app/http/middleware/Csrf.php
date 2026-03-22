<?php

namespace app\http\middleware;

use Exception;
use framework\web\request\Request;

class Csrf {
    public function handle($next, Request $request) {
        if ($request->method() != 'GET') {
            if (!\framework\utils\security\Csrf::validate($request->post('_csrf'))) {
                throw new Exception("Unable to verify CSRF token");
            }
        }

        return $next();
    }
}