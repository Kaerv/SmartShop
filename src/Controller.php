<?php

namespace SmartShop;

use SmartShop\Controller\ProductListingController;

/**
 * Processing queries and displaying content
 */
abstract class Controller
{
    /** @var array Variables passed to template */
    protected $tpl_vars = [];

    /** @var string Template name */
    protected $template;

    /** @var array List of hooks */
    public static $hooks = [];

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->assignTplVars(array(
            'nav_listing_url' => Link::getControllerLink('ProductListing'),
            'nav_cart_url' => Link::getControllerLink('cart')
        ));
    }

    public function init()
    {
        global $entity_manager;
        $output = $this->postProcess();
        $entity_manager->flush();
        $output .= $this->display();

        return $output;
    }

    /**
     * Displays content
     */
    public function display()
    {
        return getTemplate(_TPL_DIR_, $this->template, $this->tpl_vars);
    }

    /**
     * Processing POST requests
     */
    public function postProcess()
    {
        
    }

    /**
     * Adds variables to tpl vars
     * 
     * @param array $vars Array with vars to assign
     */
    protected function assignTplVars($vars) 
    {
        $this->tpl_vars = array_merge($this->tpl_vars, $vars);
    }
}