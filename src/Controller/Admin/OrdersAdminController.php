<?php

use SmartShop\AdminController;
use SmartShop\Order;
use SmartShop\Product;

class OrdersAdminController extends AdminController
{
    public function __construct()
    {
        $this->template = "page/orders";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $this->assignTplVars(array(
            'orders' => Order::getOrders()
        ));

        return parent::display();
    }
}