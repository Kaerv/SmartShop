<?php

use SmartShop\AdminController;
use SmartShop\Product;

class ProductsAdminController extends AdminController
{
    public function __construct()
    {
        $this->template = "page/products";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $this->assignTplVars(array(
            'products' => Product::getProducts()
        ));

        return parent::display();
    }
}