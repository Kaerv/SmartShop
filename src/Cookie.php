<?php

namespace SmartShop;

/**
 * Class used to store and load values from cookie
 */
class Cookie
{
    /**
     * Gets value from cookies
     * 
     * @param string $key Key of cookie
     * 
     * @return mixed value of cookie
     */
    public static function get($key)
    {
        if(isset($_COOKIE[$key])) {
            return unserialize($_COOKIE[$key]);
        }

        return false;
    }

    /**
     * Sets cookie value
     * 
     * @param string $key Key of cookie
     * @param string $value Value of cookie
     */
    public static function set($key, $value)
    {
        setcookie($key, serialize($value), time() + (86400 * 30), "/");
    }
}