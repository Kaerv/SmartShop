<?php

namespace SmartShop;

/**
 * Creates links to pages
 */

class Link
{
    /**
     * Returns url to "Add to cart" button
     * 
     * @return string Url to add to cart
     */
    public static function getAddToCartLink() : string
    {
        return self::getControllerLink('Cart');
    }

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
        
        foreach ($args as $key => $value) {
            $controller_url .= "&$key=$value";
        }

        return $controller_url;
    }

    /**
     * Returns url to product listing
     * 
     * @return string Url to product listing
     */
    public static function getProductListingLink() : string
    {
        return self::getBaseUrl() . '?controller=ProductListing';
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
}