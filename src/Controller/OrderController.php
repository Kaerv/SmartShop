<?php

use SmartShop\Controller;
use SmartShop\Link;

use Entities\Cart;
use Entities\Order;

/**
 * Manage orders
 */
class OrderController extends Controller
{
    public function postProcess()
    {
        if (isset($_POST['place_order'])) {
            Order::create(Cart::getCurrentCart());
            
            Cart::reinit();
            header('Location: ' . Link::getControllerLink('ThankYou', []));
            die();
        }
    }

}