<?php

namespace app\http\models;

use framework\web\models\attributes\Required;
use framework\web\models\attributes\Length;
use framework\web\models\Model;

class LoginModel extends Model {
    #[Required]
    #[Length(min: 8, max: 255)]
    public string $email = '';

    #[Required]
    #[Length(min: 8, max: 255)]
    public string $password = '';
}