<?php

namespace Entities;

use SmartShop\Price;

/**
 * @Entity
 * @Table(name="ss_product")
 */
class Product
{
    /** 
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    
    /** 
     * @Column(type="string")
     */
    private $name;

    /** 
     * @Column(type="float")
     */
    private $price;

    /**
     * Gets all products
     * 
     * @return array<Product> Array with all products
     */
    public static function getProducts()
    {
        global $entity_manager;
        return $entity_manager->getRepository("Entities\Product")->findAll();
    }

    /**
     * Search product by id
     * 
     * @param int $id Product ID
     * 
     * @return Product Product found
     */
    public static function getById($id)
    {
        global $entity_manager;
        return $entity_manager->getRepository("Entities\Product")->find($id);
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

    /**
     * Returns price with currency symbol
     * 
     * @return string Formatted price
     */
    public function getFormattedPrice()
    {
        return Price::format($this->price);
    }
}
