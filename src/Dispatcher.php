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
        self::loadControllers();
        $controllerName = ($_REQUEST['controller'] ?? "ProductListing") . "Controller";

        $controller = new $controllerName();

        Hook::init();
        Cart::init();

        echo $controller->init();
    }

    private static function loadControllers()
    {
        $controllers = scandir(__DIR__ . "/Controller");

        foreach ($controllers as $controller) {
            if (strpos($controller, "Controller") !== false) {
                require_once(__DIR__ . "/Controller/$controller");
            }
        }
    }
    
}