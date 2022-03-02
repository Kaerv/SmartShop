<?php

use SmartShop\AdminController;
use Entities\Product;
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
            'product' => ProductAdminPresenter::present($product)
        ));

        return parent::display();
    }

    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {
        global $entity_manager;
        if(isset($_POST['submit_product'])) {
            $product_data = $_POST['product'];
            $product = Product::getById($product_data['id']);

            $product
                ->setName($product_data['name'])
                ->setPrice($product_data['price']);

            $entity_manager->persist($product);
        }
    }
}