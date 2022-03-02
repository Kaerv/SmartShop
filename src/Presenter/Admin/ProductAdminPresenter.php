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

        $object_arr['edit_url'] = Link::getAdminControllerLink("ProductDetails", array(
            'id_product' => $object_arr['id']
        ));

        return $object_arr;
    }
}