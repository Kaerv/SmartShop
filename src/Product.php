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
        $db = Db::getInstance();
        $this->id = $id;

        if ($name == null || $price == null) {
            $data = $db->getRow("SELECT name, price FROM ss_product WHERE id_product = $id");

            $this->name = $data['name'];
            $this->price = $data['price'];
            $this->formatted_price = Price::format($data['price']);
        } else {
            $this->name = $name;
            $this->price = $price;
            $this->formatted_price = Price::format($price);
        }
    }


    /**
     * Removes product from database
     * 
     */
    public function remove()
    {
        $db = Db::getInstance();
        $db->delete("ss_product", "id_product = $this->id");
    }
    
    /**
     * Returns array with all products
     * 
     * @return array Array with Product objects
     */
    public static function getProducts()
    {
        $db = Db::getInstance();
        $data = $db->query("SELECT id_product as id, name as name, price as price FROM ss_product");

        $products = array();
        foreach ($data as $product) {
            $products[] = new Product($product['id'], $product['name'], $product['price']);
        }

        return $products;
    }

    /**
     * Creates new product
     * 
     * @param string $name Product name
     * @param float $price Product price
     */
    public static function add($name, $price)
    {
        $db = Db::getInstance();

        return $db->insert('ss_product', [
            'name' => $name,
            'price' => $price
        ]);
    }
}