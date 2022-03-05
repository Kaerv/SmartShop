<?php

use Entities\Order;
use SmartShop\AdminController;
use SmartShop\Presenter\Admin\OrderAdminPresenter;

class OrderAdminController extends AdminController
{
    public function __construct()
    {
        $this->template = "page/order";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $this->assignTplVars(array(
            'order' => OrderAdminPresenter::present(Order::getById($_GET['id_order']))
        ));

        return parent::display();
    }
}