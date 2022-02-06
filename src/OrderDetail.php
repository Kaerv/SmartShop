<?php

namespace SmartShop;

/**
 * Represents one product in order
 */
class OrderDetail
{
    /** @var int OrderDetail ID */
    public $id;

    /** @var int Order ID */
    public $id_order;

    /** @var int Product ID */
    public $id_product;

    /** @var int Product price */
    public $product_price;

    /** @var string Product name */
    public $product_name;

    /** @var int Quantity */
    public $quantity;

    /**
     * Class constructor
     */
    public function __construct($id = null)
    {
        if($id) {
            $this->id = $id;
            $this->loadData();
        }
    }

    /**
     * Loads data from db
     */
    public function loadData()  
    {
        $db = Db::getInstance();
        
        $row = $db->getRow("SELECT * FROM ss_order_detail WHERE id_cart_content = $this->id");

        $this->id_product = $row['id_product'];
        $this->id_order = $row['id_order'];
        $this->product_price = $row['product_price'];
        $this->product_name = $row['product_name'];
        $this->quantity = $row['quantity']; 
    }

    /**
     * Creates new order detail in database
     * 
     * @param int $id_order Order ID
     * @param int $id_product Product ID
     * @param string $product_name Product name
     * @param float $product_price Product price
     * @param int $quantity Quantity
     */
    public static function create(
        $id_order,
        $id_product,
        $product_name,        
        $product_price,
        $quantity
    )
    {
        $order_detail = new self();

        $order_detail->id_order = $id_order;
        $order_detail->id_product = $id_product;
        $order_detail->product_name = $product_name;
        $order_detail->product_price = $product_price;
        $order_detail->quantity = $quantity;
        
        $order_detail->save();
    }

    /**
     * Saves in database
     */
    public function save()
    {
        $db = Db::getInstance();
        
        $db->insert('ss_order_detail', [
            'id_order' => (int) $this->id_order,
            'id_product' => (int) $this->id_product,
            'product_name' => (string) $this->product_name,
            'product_price' => (float) $this->product_price,
            'quantity' => (int) $this->quantity
        ]);

    }
}