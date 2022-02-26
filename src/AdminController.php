<?php

namespace SmartShop;

use SmartShop\Controller;

class AdminController extends Controller
{
    /**
     * Displays content
     */
    public function display()
    {
        $this->assignTplVars([
            'products_url' => Link::getAdminControllerLink('ProductsAdmin'),
            'orders_url' => Link::getAdminControllerLink('OrdersAdmin')
        ]);

        return getTemplate(_ADMIN_TPL_DIR_, $this->template, $this->tpl_vars);
    }
}