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
     * {@inheritdoc}
     */
    public function display()
    {
        $cart = Cart::getCurrentCart();

        return getTemplate("listing", $args = array(
            'cart_content' => $cart->getCartContent(), 
            'products' => Product::getProducts(),
            'add_to_cart_url' => Link::getAddToCartLink()
        ));
    }
}