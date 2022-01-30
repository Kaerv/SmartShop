<?php

namespace SmartShop;

/**
 * executes list of functions assigned to specific place in code
 */
class Hook
{
    /** @var array All registered hooks and functions assigned to them */
    protected static $hooks = [];

    /**
     * Collects all hooks to be called
     */
    public static function init()
    {
        $classes = get_declared_classes();
        $controllers = [];

        foreach ($classes as $class) {
            if (strpos($class, "Controller") !== false) {
                $controllers[] = $class;
            }
        }

        foreach($controllers as $controller) {
            $hooks = $controller::$hooks;

            foreach($hooks as $hook) {
                self::register($hook, $controller);
            }
        }
    }

    /**
     * Execute functions assigned to hook
     */
    public static function call($hook_name)
    {
        if (isset(self::$hooks[$hook_name])) {
            $classes = self::$hooks[$hook_name];
            foreach($classes as $class) {
                $instance = new $class();

                echo $instance->{"hook". $hook_name}();
            }
        }  
    }

    public static function register($hook_name, $class)
    {
        if (!isset(self::$hooks[$hook_name])) {
            self::$hooks[$hook_name] = array();
        }

        self::$hooks[$hook_name][] = $class;
    }
}