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
        if(isset($_POST['add_to_cart'])) {
            $cart->addProduct($_POST['id_product']);
        } elseif(isset($_POST['remove_from_cart'])) {
            $cart->removeProduct($_POST['id_product']);
        }

        header('Location: '. Link::getProductListingLink());
    }

    public function hookHeader()
    {
        $cart = Cart::getCurrentCart();
        return getTemplate('partials/cart', array(
            'cart_url' => Link::getControllerLink('Cart'),
            'cart_content' => $cart->getCartContent(), 
        ));
    }
}