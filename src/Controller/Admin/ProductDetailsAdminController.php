<?php

use SmartShop\AdminController;
use SmartShop\Product;

class ProductDetailsAdminController extends AdminController
{
    public function __construct()
    {
        $this->template = "page/product";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $this->assignTplVars(array(
            'product' => new Product($_POST['id_product'])
        ));

        return parent::display();
    }

    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {
    }
}