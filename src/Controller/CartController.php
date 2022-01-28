<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Cookie;
use SmartShop\Cart;

class CartController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->id_cart = Cookie::get('id_cart');

        if(!$this->id_cart) {
            $cart = Cart::create();
            $this->id_cart = $cart->id;
            Cookie::set('id_cart', $this->id_cart);
        }
        return parent::init();
    }

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
        $cart = new Cart($this->id_cart);
        $cart->addProduct($_POST['id_product']);
        header('Location: '. Link::getProductListingLink());
    }
}