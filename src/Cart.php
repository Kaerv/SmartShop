<?php

namespace SmartShop;

/**
 * Represents cart and 
 */
class Cart
{
    /** @var Cart Cart instance for current context */
    private static $cart;

    /** @var int Cart ID */
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
        $result = $db->query("SELECT * FROM ss_cart_content WHERE id_cart = $this->id");
        
        $cart_content = array();

        foreach ($result as $cart_el) {
            $cart_content[] = new Product($cart_el['id_product']);
        }
        return $cart_content;
    }

    /**
     * Returns cart content
     * 
     * @return array Cart content
     */
    public function getCartContent()
    {
        return $this->cart_content;
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
        $result = $db->insert('ss_cart_content', [
            'id_cart' => $this->id,
            'id_product' => $id_product,
            'quantity' => 1
        ]);

        $this->cart_content = $this->loadCartContent();
        return $result;
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

    /**
     * Initializes static variable with cart ID
     */
    public static function init()
    {
        $id_cart = Cookie::get('id_cart');

        if(!$id_cart) {
            $cart = Cart::create();
            self::$cart = $cart;
            Cookie::set('id_cart', $cart->id);
        } else {
            self::$cart = new Cart($id_cart);
        }
    }

    /**
     * Returns cart object for current context
     * 
     * @return Cart Current cart 
     */
    public static function getCurrentCart()
    {
        return self::$cart;
    }
}