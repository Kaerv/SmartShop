<?php

namespace SmartShop;

/**
 * Represents order
 */
class Order
{
    /** @var int Order ID */
    private $id;

    /** @var int Cart ID */
    public $id_cart;

    /** @var flaot Order total price */
    public $total_price;

    /** @var string When order was placed */
    public $date_placed;

    /**
     * Class constructor
     * 
     * @param int $id Order ID
     */
    public function __construct($id = null)
    {
        $this->$id = $id;
    }

    /**
     * Creating new order depends on Cart
     * 
     * @param Cart $cart Cart from which order will be created
     * 
     * @return int|false New order ID or false on fail
     */
    public static function create($cart)
    {
        $order = new self();
        $order->total_price = $cart->getCartTotal();
        $order->id_cart = $cart->id;
        $order->save();

        foreach($cart->getCartContent() as $row) {
            $order->createOrderDetail($row);
        }
    }

    /**
     * Saves order in database
     * 
     * @return int New order ID
     */
    public function save()
    {
        $db = Db::getInstance();

        if ($this->id) {
            $db->update(
                'ss_order', 
                [
                    'total_price' => $this->total_price,
                    'id_cart' => $this->id_cart
                ],
                "id_order = $this->id"
            );
        } else {
            $this->id = $db->insert('ss_order', [
                'total_price' => $this->total_price,
                'id_cart' => $this->id_cart
            ]);
        }
        
    }

    /**
     * Creates order for one product 
     * 
     * @param array $cart_content Cart row
     */
    public function createOrderDetail($cart_content)
    {
        $product = new Product($cart_content['id_product']);
        $order_detail = OrderDetail::create(
            $this->id,
            $product->id,
            $product->name,
            $product->price,
            $cart_content['quantity']
        );

    }
}