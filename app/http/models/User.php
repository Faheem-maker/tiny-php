<?php

namespace app\http\models;

use DateTime;
use framework\db\ActiveModel;
use framework\models\attributes\Email;
use framework\models\attributes\Length;
use framework\models\attributes\PrimaryKey;
use framework\models\attributes\Required;

class User extends ActiveModel {
    public function __construct()
    {
        $this->created_at = new DateTime();
        $this->modified_at = new DateTime();
    }
    #[PrimaryKey]
    public int $id = 0;

    #[Required()]
    #[Length(min: 3, max: 50)]
    public string $username = '';

    #[Required]
    #[Email()]
    #[Length(min: 8, max: 255)]
    public string $email = '';

    #[Required]
    #[Length(min: 8)]
    public string $password = '';
    
    public \DateTime $created_at;
    public \DateTime $updated_at;
}