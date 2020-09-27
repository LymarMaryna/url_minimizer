<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
use Dotenv\Dotenv;
use App\Core\Router;

require_once('vendor/autoload.php');

session_start();

$dotenv = Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

Router::run();
