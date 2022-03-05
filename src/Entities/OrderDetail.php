<?php

namespace Entities;

use SmartShop\Entity;

/**
 * @Entity
 * @Table(name="ss_order_detail")
 */
class OrderDetail extends Entity
{
    /**
     * {@inheritdoc}
     */
    protected static $repository = "Entities\OrderDetail";

    /** 
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @OneToOne(targetEntity="Order")
     * @JoinColumn(name="id_order", referencedColumnName="id")
     */
    private $order;

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
     * @return OrderDetail
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
     * @return OrderDetail
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
     * @return OrderDetail
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
     * @return OrderDetail
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
     * Set order.
     *
     * @param \Entities\Order|null $order
     *
     * @return OrderDetail
     */
    public function setOrder(\Entities\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order.
     *
     * @return \Entities\Order|null
     */
    public function getOrder()
    {
        return $this->order;
    }
}
