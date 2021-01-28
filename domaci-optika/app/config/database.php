<?php
// Database config.

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'database' => 'domaci-optika',
    'charset' => 'utf8'
]);

$capsule->bootEloquent();