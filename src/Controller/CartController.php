<?php

use SmartShop\Controller;
use SmartShop\Link;

class CartController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function display()
    {

    }

    public function postProcess()
    {
        header('Location: '. Link::getProductListingLink());
    }
}