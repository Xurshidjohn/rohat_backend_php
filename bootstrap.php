<?php

    use Illuminate\Database\Capsule\Manager as Capsule;

    include(__DIR__."/vendor/autoload.php");

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver' => 'sqlite',
        'database' => __DIR__."/db/main.db",
        'prefix' => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

?>