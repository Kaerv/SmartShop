<?php

namespace SmartShop\Presenter\Admin;

use SmartShop\Link;
use SmartShop\Presenter\AdminPresenter;

/**
 * {@inheritdoc}
 */
class ProductAdminPresenter extends AdminPresenter
{
    public static function present($object) {
        $object_arr = parent::present($object);

        $object_arr['edit_url'] = Link::getAdminControllerLink("ProductDetailsAdmin", array(
            'id_product' => $object_arr['id'],
            'action' => 'edit'
        ));

        return $object_arr;
    }
}