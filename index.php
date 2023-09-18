<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

require_once(__DIR__ . '/vendor/autoload.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$builder = new JavascriptFrameworks\React\ApplicationBuilder();
$app = $builder->buildWebApplication();
$app->run();
