<?php

namespace SmartShop;

/**
 * Represents cart and 
 */
class Cart
{
    /** Cart ID */
    public $id;

    /** @var array Products in cart */
    protected $cart_content;

    /**
     * Class constructor
     */
    public function __construct(int $id = null) 
    {
        $this->id = $id;
        $this->cart_content = !empty($this->id) ? $this->loadCartContent() : [];
    }

    /**
     * Loads cart content
     * 
     * @return array Cart content rows
     */
    protected function loadCartContent()
    {
        $db = new Db();

        return $db->query("SELECT * FROM ss_cart_content WHERE id_cart = $this->id");
    }

    /**
     * Adds product to cart
     * 
     * @param int $id_product Product ID
     * 
     * @return int ID of cart content
     */
    public function addProduct($id_product)
    {
        $db = new Db();

        return $db->insert('ss_cart_content', [
            'id_cart' => $this->id,
            'id_product' => $id_product,
            'quantity' => 1
        ]);
    }

    /**
     * Creates in db new cart
     * 
     * @return Cart New cart
     */
    public static function create()
    {
        $db = new Db();
        $result = $db->insert('ss_cart', []);

        if ($result !== false) {
            return new self($result);
        }
        return false;
    }
}