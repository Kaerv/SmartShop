<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Product;

/**
 * {@inheritdoc}
 */
class ProductListingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function display()
    {
        return getTemplate("listing", $args = array(
            'products' => Product::getProducts(),
            'add_to_cart_url' => Link::getAddToCartLink()
        ));
    }
}