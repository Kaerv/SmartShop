<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Cookie;
use SmartShop\Cart;

class CartController extends Controller
{
    /** {@inheritdoc} */
    public static $hooks = [];

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = "page/cart";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $cart = Cart::getCurrentCart();

        $this->assignTplVars(array(
            'cart_url' => Link::getControllerLink('Cart'),
            'cart_content' => $cart->getCartContent(), 
        ));

        return parent::display();
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
    }
}