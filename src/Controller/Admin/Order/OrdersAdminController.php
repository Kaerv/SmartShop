<?php

use SmartShop\AdminController;
use Entities\Order;
use Entities\Product;
use SmartShop\Pagination;
use SmartShop\Presenter\Admin\OrderAdminPresenter;

class OrdersAdminController extends AdminController
{
    protected $items_for_page = 10;
    public function __construct()
    {
        $this->template = "page/orders";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $page = $_GET['page'] ?? 1;
        $orders = OrderAdminPresenter::presentAll(Order::getAll($page, $this->items_for_page));
        $this->assignTplVars(array(
            'orders' => $orders,
            'pages' => Pagination::getPages("Order", "OrdersAdmin", $this->items_for_page, true),
            'current_page' => $page
        ));

        return parent::display();
    }
}