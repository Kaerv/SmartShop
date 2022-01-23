<?php

use SmartShop\Controller;
use SmartShop\Link;

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
            'add_to_cart_url' => Link::getAddToCartLink()
        ));
    }
}