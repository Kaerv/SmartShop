<?php

use SmartShop\AdminController;
use Entities\Product;
use SmartShop\Link;
use SmartShop\Presenter\Admin\ProductAdminPresenter;

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
        $product = Product::getById($_GET['id_product']);
        $this->assignTplVars(array(
            'product' => ProductAdminPresenter::present($product),
            'form_url' => Link::getAdminControllerLink('ProductAdmin')
        ));

        return parent::display();
    }
}