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
        $products = ProductFrontPresenter::presentAll(Product::getProducts($page, $this->items_for_page));
        $this->assignTplVars(array(
            'products' => $products,
            'add_to_cart_url' => Link::getControllerLink('Cart'),
            'pages' => $this->getPages(),
            'current_page' => $page
        ));

        return parent::display();
    }

    /**
     * Gets all pages
     * 
     * @return array Pages with url
     */
    public function getPages()
    {
        $products_count = Product::getProductsCount();
        $pages_count = (int) ($products_count / $this->items_for_page);
        
        if ($products_count % $this->items_for_page > 0) {
            $pages_count++;
        }

        $pages = array();

        for ($i = 1; $i <= $pages_count; $i++) {
            $pages[$i] = array(
                'url' => Link::getControllerLink('ProductListing', array('page' => $i))
            );
        }

        return $pages;
    }
}