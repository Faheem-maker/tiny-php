<?php

namespace app\http\models;

use DateTime;
use framework\db\ActiveModel;
use framework\web\models\attributes\Required;
use framework\web\models\attributes\Email;
use framework\web\models\attributes\Hashed;
use framework\web\models\attributes\Length;
use framework\web\models\attributes\PrimaryKey;

class User extends ActiveModel {
    public function __construct()
    {
        $this->created_at = new DateTime();
        $this->modified_at = new DateTime();
    }
    #[PrimaryKey]
    public int $id = 0;

    #[Required]
    #[Length(min: 3, max: 50)]
    public string $username = '';

    #[Required]
    #[Email]
    #[Length(min: 8, max: 255)]
    public string $email = '';

    #[Required]
    #[Length(min: 8)]
    #[Hashed]
    public string $password = '';
    
    public \DateTime $created_at;
    public \DateTime $modified_at;
}