<?php

use SmartShop\Controller;
use SmartShop\Link;
use SmartShop\Cart;

use Entities\Product;
use SmartShop\Pagination;
use SmartShop\Presenter\Front\ProductFrontPresenter;

/**
 * {@inheritdoc}
 */
class ProductListingController extends Controller
{
    /** @var int How many items will be displayed on single page */
    private $items_for_page = 10;

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
        $page = $_GET['page'] ?? 1;
        $products = ProductFrontPresenter::presentAll(Product::getAll($page, $this->items_for_page));
        $this->assignTplVars(array(
            'products' => $products,
            'add_to_cart_url' => Link::getControllerLink('Cart'),
            'pages' => Pagination::getPages('Product', 'ProductListing', $this->items_for_page),
            'current_page' => $page
        ));

        return parent::display();
    }
}