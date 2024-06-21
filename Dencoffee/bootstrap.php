<?php
    define('ROOT_DIR', __DIR__);
    define('VIEWS_DIR', __DIR__ . '/views');


    require ROOT_DIR . '/vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use Illuminate\Database\Capsule\Manager as Capsule;

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => $_ENV['DBHOST'],
        'database'  => $_ENV['DBNAME'],
        'username'  => $_ENV['DBUSER'],
        'password'  => $_ENV['DBPASS'],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

?>