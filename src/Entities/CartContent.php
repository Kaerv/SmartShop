<?php

namespace Entities;

use SmartShop\Entity;
use SmartShop\Price;

/**
 * @Entity
 * @Table(name="ss_cart_content")
 */
class CartContent extends Entity
{
    /**
     * {@inheritdoc}
     */
    protected static $repository = "Entities\CartContent";

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Cart", inversedBy="cart_contents")
     * @JoinColumn(name="id_cart", referencedColumnName="id", nullable=false)
     * @var \Entities\Cart
     */
    private $cart;

    /**
     * @Column(type="integer")
     */
    private $id_product;
    
    /**
     * @Column(type="string")
     */
    private $product_name;

    /**
     * @Column(type="float")
     */
    private $product_price;

    /**
     * @Column(type="smallint")
     */
    private $quantity;

    /**
     * Returns formatted price for product in cart
     * 
     * @return float Formatted price
     */
    public function getFormattedPrice()
    {
        return Price::format($this->product_price);
    }

    /**
     * Returns formatted price for cart row subtotal
     * 
     * @return float Formatted price
     */
    public function getFormattedSubtotal()
    {
        return Price::format($this->product_price * $this->quantity);
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idProduct.
     *
     * @param int $idProduct
     *
     * @return CartContent
     */
    public function setIdProduct($idProduct)
    {
        $this->id_product = $idProduct;

        return $this;
    }

    /**
     * Get idProduct.
     *
     * @return int
     */
    public function getIdProduct()
    {
        return $this->id_product;
    }

    /**
     * Set productName.
     *
     * @param string $productName
     *
     * @return CartContent
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;

        return $this;
    }

    /**
     * Get productName.
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set productPrice.
     *
     * @param float $productPrice
     *
     * @return CartContent
     */
    public function setProductPrice($productPrice)
    {
        $this->product_price = $productPrice;

        return $this;
    }

    /**
     * Get productPrice.
     *
     * @return float
     */
    public function getProductPrice()
    {
        return $this->product_price;
    }

    /**
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return CartContent
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set cart.
     *
     * @param \Entities\Cart $cart
     *
     * @return CartContent
     */
    public function setCart(\Entities\Cart $cart)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart.
     *
     * @return \Entities\Cart
     */
    public function getCart()
    {
        return $this->cart;
    }
}
