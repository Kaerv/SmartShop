<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Cookie;
use SmartShop\Price;

use Entities\Cart;

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
            'cart_content' => $cart->getCartContents(), 
            'cart_total' => Price::format($cart->getCartTotal())
        ));

        return parent::display();
    }

    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {
        global $entity_manager;

        $cart = Cart::getCurrentCart();
        if(isset($_POST['add_to_cart'])) {
            $cart->addProduct($_POST['id_product']);
        } elseif(isset($_POST['remove_from_cart'])) {
            $cart_content = $cart->getCartContentByProductId($_POST['id_product']);
            if($cart_content != false) {
                $cart->removeCartContent($cart_content);
                $entity_manager->remove($cart_content);
            }
        }elseif(isset($_POST['update_quantity'])) {
            $cart_content = $cart->getCartContentByProductId($_POST['id_product']);
            $cart_content->setQuantity($_POST['quantity']);
            $entity_manager->persist($cart_content);
        }
    }
}