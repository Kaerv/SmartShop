<?php

namespace SmartShop\Presenter\Front;

use SmartShop\Link;
use SmartShop\Presenter\FrontPresenter;

/**
 * {@inheritdoc}
 */
class ProductFrontPresenter extends FrontPresenter
{
    public static function present($object) {
        $object_arr = parent::present($object);

        $object_arr['formatted_price'] = $object->getFormattedPrice();
        return $object_arr;
    }
}