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