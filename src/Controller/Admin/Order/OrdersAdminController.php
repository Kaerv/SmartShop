<?php

use SmartShop\AdminController;
use Entities\Order;
use Entities\Product;
use SmartShop\Presenter\Admin\OrderAdminPresenter;

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
        $orders = OrderAdminPresenter::presentAll(Order::getOrders());
        $this->assignTplVars(array(
            'orders' => $orders,
        ));

        return parent::display();
    }
}