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

        $object_arr['url'] = Link::getAdminControllerLink("OrderAdmin", array(
            'id_order' => $object_arr['id']
        ));
        $object_arr['date_placed'] = $object_arr['date_placed']->format("Y-m-d H:i:s");

        $products = $object_arr['cart']->getCartContents()->toArray();
        $object_arr['products'] = array();
        
        foreach ($products as $product) {
            $object_arr['products'][] = array(
                'id' => $product->getIdProduct(),
                'name' => $product->getProductName(),
                'price' => $product->getProductPrice(),
                'quantity' => $product->getQuantity(),
                'subtotal' => $product->getProductPrice() * $product->getQuantity()
            );
        }

        return $object_arr;
    }
}