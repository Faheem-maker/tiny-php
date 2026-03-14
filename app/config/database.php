<?php

use framework\db\drivers\MySqlDriver;
use framework\db\QueryBuilder;

app()->registerComponent('db', new QueryBuilder(new MySqlDriver([
    'host' => env('DB_HOST', 'localhost'),
    'port' => env('DB_PORT', 3306),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'database' => env('DB_DATABASE', 'test'),
])));