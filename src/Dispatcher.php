<?php

namespace SmartShop;

use FFI\Exception;

/**
 * Initializes everything and load needed controller
 */
class Dispatcher
{
    /**
     * Initialize site
     */
    public static function dispatch()
    {
        $controllerName = ($_REQUEST['controller'] ?? "ProductListing") . "Controller";
        require_once(__DIR__ . "/Controller/$controllerName.php");

        $controller = new $controllerName();

        Cart::init();

        echo $controller->init();
    }
    
}