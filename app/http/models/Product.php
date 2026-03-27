<?php

namespace app\http\models;

use framework\db\ActiveModel;
use framework\web\models\attributes\Length;
use framework\web\models\attributes\PrimaryKey;
use framework\web\models\attributes\Required;

class Product extends ActiveModel
{
    #[PrimaryKey]
    public int $id = 0;

    #[Required]
    #[Length(min: 3, max: 50)]
    public string $name = '';

    #[Required]
    public float $price = 0;
}