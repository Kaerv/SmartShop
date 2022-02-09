<?php

use SmartShop\AdminController;

class ProductsAdminController extends AdminController
{
    public function __construct()
    {
        $this->template = "page/products";
    }
}