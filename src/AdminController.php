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
        return getTemplate(_ADMIN_TPL_DIR_, $this->template, $this->tpl_vars);
    }
}