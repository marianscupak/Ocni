<?php
// Database config.

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ocni',
    'charset' => 'utf8'
]);

$capsule->bootEloquent();
