<?php

use SmartShop\AdminController;
use Entities\Order;
use Entities\Product;

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