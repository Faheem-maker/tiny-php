<?php

namespace framework\utils\security;

class Csrf {
    public static function allocate() {
        if (function_exists('mcrypt_create_iv')) {
            $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        } else {
            $token = bin2hex(openssl_random_pseudo_bytes(32));
        }

        return $_SESSION['csrf_token'] = $token;
    }

    public static function validate($token) {
        if (!empty($token) && hash_equals($_SESSION['csrf_token'], $token)) {
            unset($_SESSION['csrf_token']);
            return true;
        }

        return false;
    }
}