<?php

namespace SmartShop\Presenter\Admin;

use SmartShop\Link;
use SmartShop\Presenter\AdminPresenter;

/**
 * {@inheritdoc}
 */
class OrderAdminPresenter extends AdminPresenter
{
    public static function present($object) {
        $object_arr = parent::present($object);

        $object_arr['edit_url'] = Link::getAdminControllerLink("OrderDetails", array(
            'id_order' => $object_arr['id']
        ));

        return $object_arr;
    }
}