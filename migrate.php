<?php


use App\Core\Database\Migrate;
use Dotenv\Dotenv;

require_once 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$action = !empty($argv[1]) ? $argv[1] : "run";

$migrate = new Migrate();

if (method_exists($migrate, $action)) {
    $migrate->{$action}('migrate.sql');
} else {
    echo 'ERROR. Wrong method name.';
}



