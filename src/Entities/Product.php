<?php

namespace Entities;

use SmartShop\Entity;
use SmartShop\Price;

/**
 * @Entity
 * @Table(name="ss_product")
 */
class Product extends Entity
{
    protected static $repository = "Entities\Product";
    /** 
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    public $id;
    
    /** 
     * @Column(type="string")
     */
    public $name;

    /** 
     * @Column(type="float")
     */
    public $price;

    /**
     * Returns price with currency symbol
     * 
     * @return string Formatted price
     */
    public function getFormattedPrice()
    {
        return Price::format($this->price);
    }

    /**
     * Get id.
     *
     * @return \int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price.
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
