<?php

namespace SmartShop;

/**
 * Creates links to pages
 */

class Link
{
    /**
     * Returns url to Controller
     * 
     * @param string $name Name of controller;
     * @param array $args GET args to be append to url
     * 
     * @return string Url to Controller
     */
    public static function getControllerLink($name, $args = []) : string
    {
        $controller_url = self::getBaseUrl() . "?controller=$name";
        $controller_url .= self::buildGetVariables($args);

        return $controller_url;
    }

    public static function getAdminControllerLink($name, $args = []) : string 
    {
        $controller_url = self::getAdminBaseUrl() . "?controller=$name";
        $controller_url .= self::buildGetVariables($args);

        return $controller_url;
    }

    /**
     * Returns base url: "http://example.com/"
     * 
     * @return string Base url
     */
    private static function getBaseUrl() : string
    {
        return "http://" . $_SERVER['HTTP_HOST'] . "/";
    }

        /**
     * Returns base url to admin panel: "http://example.com/admin"
     * 
     * @return string Base url
     */
    private static function getAdminBaseUrl() : string
    {
        return "http://" . $_SERVER['HTTP_HOST'] . "/admin/";
    }

    /**
     * builds request URI from array of args
     * 
     * @param array $args Args to be passed to url
     * 
     * @return string Request URI
     */
    private static function buildGetVariables($args)
    {
        $query_string = "";
        foreach ($args as $key => $value) {
            $query_string .= "&$key=$value";
        }

        return $query_string;
    }
}