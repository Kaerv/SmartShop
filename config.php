<?php

// development|staging
$env = "development";

if($env == "development") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

define('_TPL_DIR_', __DIR__ . '/templates/');
define('_ADMIN_TPL_DIR_', __DIR__ . '/admin/templates/');

define('DB_HOST', 'localhost');
define('DB_NAME', 'smartshop');
define('DB_USER', 'root');
define('DB_PASS', 'password');

require_once "vendor/autoload.php";
require_once "config/bootstrap.php";