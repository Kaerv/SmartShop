<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Cookie;
use SmartShop\Cart;

class CartController extends Controller
{
    /** {@inheritdoc} */
    public static $hooks = ['header'];
    /**
     * {@inheritdoc}
     */
    public function display()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {
        $cart = Cart::getCurrentCart();
        $cart->addProduct($_POST['id_product']);
        header('Location: '. Link::getProductListingLink());
    }

    public function hookHeader()
    {
        $cart = Cart::getCurrentCart();
        return getTemplate('partials/cart', array(
            'cart_content' => $cart->getCartContent(), 
        ));
    }
}