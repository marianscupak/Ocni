<<<<<<< HEAD
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
=======
<?php
// Database config.

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'database' => 'ocni',
    'charset' => 'utf8'
]);

$capsule->bootEloquent();
>>>>>>> routes-update
