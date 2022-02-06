<?php

use SmartShop\Cart;
use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Price;

/**
 * Displays checkout page and processes orders
 */
class CheckoutController extends Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = "page/checkout";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $cart = Cart::getCurrentCart();

        if ($cart->isEmpty()) {
            header('Location: ' . Link::getControllerLink('Cart'));
            die();
        } 

        $this->assignTplVars(array(
            'place_order_url' => Link::getControllerLink('Order'),
            'cart_total' => Price::format($cart->getCartTotal()) 
        ));

        return parent::display();
    }

}