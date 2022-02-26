<?php

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
        global $entity_manager;
        if (isset($_POST['add_product'])) {
            $product = (new Product())
                ->setName($_POST['product_name'])
                ->setPrice($_POST['product_price']);
            $entity_manager->persist($product);
        } else if (isset($_POST['delete_product'])) {

            $product = $entity_manager
            ->getRepository("Entities\Product")
                ->findBy([
                    'id' => $_POST['id_product'],
                ]);

            $entity_manager->remove($product[0]);
        }
    }
}