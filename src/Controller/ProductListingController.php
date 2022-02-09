<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Product;
use SmartShop\Cart;

/**
 * {@inheritdoc}
 */
class ProductListingController extends Controller
{
    /** 
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = "page/listing";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $this->assignTplVars(array(
            'products' => Product::getProducts(),
            'add_to_cart_url' => Link::getControllerLink('Cart')
        ));

        return parent::display();
    }
}