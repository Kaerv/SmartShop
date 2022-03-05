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
        $products = ProductAdminPresenter::presentAll(Product::getAll(1, 10));
        $this->assignTplVars(array(
            'products' => $products,
            'new_product_url' => Link::getAdminControllerLink('ProductDetailsAdmin', array('action' => 'add'))
        ));

        return parent::display();
    }
}