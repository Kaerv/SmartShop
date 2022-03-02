<?php

use SmartShop\AdminController;
use Entities\Product;
use SmartShop\Link;

class ProductAdminController extends AdminController
{
    public function __construct()
    {
        $this->template = "page/product";
    }

    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {
        global $entity_manager;
        
        if(isset($_POST['edit_product'])) {
            $product_data = $_POST['product'];
            $product = Product::getById($product_data['id']);

            $product
                ->setName($product_data['name'])
                ->setPrice($product_data['price']);

            $entity_manager->persist($product);
        } elseif (isset($_POST['add_product'])) {
            $product = (new Product())
                ->setName($_POST['product_name'])
                ->setPrice($_POST['product_price']);
            $entity_manager->persist($product);
        } elseif (isset($_POST['delete_product'])) {
            $product = Product::getById($_POST['id_product']);
            $entity_manager->remove($product);
        }

        header("Location:" . Link::getAdminControllerLink("ProductsAdmin"));
    }
}