<?php

use SmartShop\AdminController;
use SmartShop\Link;
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
            'products' => Product::getProducts(),
            'products_url' => Link::getAdminControllerLink('ProductAdmin'),
        ));

        return parent::display();
    }

    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {
        if (isset($_POST['add_product'])) {
            Product::add(
                $_POST['product_name'],
                $_POST['product_price']
            );
        }
    }
}