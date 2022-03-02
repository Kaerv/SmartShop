<?php

namespace SmartShop;

/**
 * Transform entity object to array with object values
 */
class Presenter
{
    /**
     * Returns array with presented object
     * 
     * @param object $object Object 
     * 
     * @return array Array with object values
     */
    public static function present($object)
    {   
        $object_arr = array();
        foreach ($object as $key => $value) {
            $object_arr[$key] = $value;
        }

        return $object_arr;
    }

    /**
     * Returns array of all object passed
     * 
     * @param array $objects Array with objects
     * 
     * @return array Array with objects as associative arrays
     */
    public static function presentAll($objects)
    {
        return array_map(function($object) {
            return static::present($object);
        }, $objects);
    }
}