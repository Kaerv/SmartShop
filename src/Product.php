<?php

namespace SmartShop;

/**
 * Single product
 */
class Product
{
    /** @var int Product id */
    public $id;
    
    /** @var string Product name */
    public $name;

    /** @var float Product price */
    public $price;
    
    /**
     * Class construct
     * 
     * @param int $id Product id
     * @param string $name Product name
     * @param float $price Product price
     */
    public function __construct(int $id, string $name = null, float $price = null)
    {
        $db = new Db;
        $this->id = $id;

        if ($name == null || $price == null) {
            $data = $db->query("SELECT name, price FROM ss_product WHERE id_product = $id");

            $this->name = $data['name'];
            $this->price = $data['price'];
        } else {
            $this->name = $name;
            $this->price = $price;
        }
    }
    
    /**
     * Returns array with all products
     * 
     * @return array Array with Product objects
     */
    public static function getProducts()
    {
        $db = new Db;
        $data = $db->query("SELECT id_product as id, name as name, price as price FROM ss_product");

        $products = array();
        foreach ($data as $product) {
            $products[] = new Product($product['id'], $product['name'], $product['price']);
        }

        return $products;
    }
}