<?php

namespace SmartShop;

use SmartShop\Controller\ProductListingController;

/**
 * Processing queries and displaying content
 */
abstract class Controller
{
    public function init()
    {
        $output = $this->postProcess();
        $output .= $this->display();

        return $output;
    }

    /**
     * Displays content
     */
    public function display()
    {
        return "";
    }

    /**
     * Processing POST requests
     */
    public function postProcess()
    {
        
    }
}