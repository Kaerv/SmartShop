<?php

namespace SmartShop;

/**
 * Price tools
 */
class Price
{
    /**
     * Returns price with specific precision and currency
     */
    public static function format($price) 
    {
        return number_format($price, 2, '.', ' ') . " zł";
    }
}