<?php

namespace SmartShop\Presenter\Admin;

use SmartShop\Link;
use SmartShop\Presenter\AdminPresenter;
use SmartShop\Price;

/**
 * {@inheritdoc}
 */
class ProductAdminPresenter extends AdminPresenter
{
    public static function present($object) {
        $object_arr = parent::present($object);

        $object_arr['formatted_price'] = Price::format($object_arr['price']); 
        $object_arr['edit_url'] = Link::getAdminControllerLink("ProductDetailsAdmin", array(
            'id_product' => $object_arr['id'],
            'action' => 'edit'
        ));

        return $object_arr;
    }
}