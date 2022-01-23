<?php

// development|staging
$env = "development";

if($env == "development") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

define('_TPL_DIR_', __DIR__ . '/templates/');

require_once "vendor/autoload.php";