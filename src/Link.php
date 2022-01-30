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
     * @return string Url to Controller
     */
    public static function getControllerLink($name) : string
    {
        return self::getBaseUrl() . "?controller=$name";
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