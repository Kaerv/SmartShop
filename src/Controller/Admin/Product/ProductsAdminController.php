<?php

use SmartShop\Presenter\Admin\ProductAdminPresenter;
use SmartShop\AdminController;
use SmartShop\Link;
use Entities\Product;
use SmartShop\Pagination;

class ProductsAdminController extends AdminController
{
    protected $items_for_page = 10;
    public function __construct()
    {
        $this->template = "page/products";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $page = $_GET['page'] ?? 1;
        $products = ProductAdminPresenter::presentAll(Product::getAll($page, $this->items_for_page));
        $this->assignTplVars(array(
            'products' => $products,
            'new_product_url' => Link::getAdminControllerLink('ProductDetailsAdmin', array('action' => 'add')),
            'pages' => Pagination::getPages("Product", "ProductsAdmin", $this->items_for_page, true),
            'current_page' => $page
        ));

        return parent::display();
    }
}