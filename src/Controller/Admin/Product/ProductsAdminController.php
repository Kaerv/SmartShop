<?php

use SmartShop\Presenter\Admin\ProductAdminPresenter;
use SmartShop\AdminController;
use SmartShop\Link;
use Entities\Product;

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
        $products = ProductAdminPresenter::presentAll(Product::getProducts());
        $this->assignTplVars(array(
            'products' => $products,
        ));

        return parent::display();
    }
}