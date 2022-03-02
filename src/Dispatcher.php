<?php

namespace SmartShop;

use FFI\Exception;

use Entities\Cart;

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
        global $entity_manager;

        if (self::isAdmin()) {
            self::loadAdminControllers();
            $controllerName = ($_REQUEST['controller'] ?? "ProductsAdmin") . "Controller";

            Hook::init("AdminController");
        } else {
            self::loadFrontControllers();
            $controllerName = ($_REQUEST['controller'] ?? "ProductListing") . "Controller";
    
            Hook::init("Controller");
            Cart::init();
        }

        $controller = new $controllerName();
        echo $controller->init();

        $entity_manager->flush();
    }

    /**
     * Returns if the current page is the admin page
     * 
     * @param bool
     */
    private static function isAdmin()
    {
        $path = explode("/", $_SERVER['REQUEST_URI']);
        return $path[1] == "admin";
    }

    /**
     * Inits admin controllers
     */
    private static function loadAdminControllers()
    {
        self::loadControllers("AdminController", "Controller/Admin");
    }

    /**
     * Inits front controllers
     */
    private static function loadFrontControllers()
    {
        self::loadControllers("Controller", "Controller/Front");
    }

    /**
     * Loads Controllers
     * 
     * @param string $name Base of controller name
     * @param string $path Path to controllers relative to src dir
     * 
     */
    private static function loadControllers($name, $path)
    {
        $controllers = scandir(__DIR__ . "/$path");

        foreach ($controllers as $controller) {
            if (strpos($controller, "$name") !== false) {
                require_once(__DIR__ . "/$path/$controller");
            }
        }
    }
}