<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Cart;

use Entities\Product;
use SmartShop\Presenter\Front\ProductFrontPresenter;

/**
 * {@inheritdoc}
 */
class ProductListingController extends Controller
{
    /** 
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = "page/listing";
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        $products = ProductFrontPresenter::presentAll(Product::getProducts());
        $this->assignTplVars(array(
            'products' => $products,
            'add_to_cart_url' => Link::getControllerLink('Cart')
        ));

        return parent::display();
    }
}