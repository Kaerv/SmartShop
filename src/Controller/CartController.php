<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Cookie;
use SmartShop\Cart;

class CartController extends Controller
{
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
            'checkout_url' => Link::getControllerLink('Checkout'),
            'cart_content' => $cart->getCartContent(), 
            'cart_total' => $cart->getCartTotal()
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
        }elseif(isset($_POST['update_quantity'])) {
            $cart_content = $cart->getCartContentByProductId($_POST['id_product']);
            $cart->updateQuantity($cart_content['id_cart_content'], $_POST['quantity']);
        }
    }
}