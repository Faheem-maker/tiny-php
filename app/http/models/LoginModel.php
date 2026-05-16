<?php

namespace app\http\models;

use framework\models\attributes\Length;
use framework\models\attributes\Required;
use framework\models\Model;

class LoginModel extends Model {
    #[Required()]
    #[Length(min: 8, max: 255)]
    public string $email = '';

    #[Required]
    #[Length(min: 8, max: 255)]
    public string $password = '';
}