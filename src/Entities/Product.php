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

    /**
     * Gets all products
     * 
     * @return array<Product> Array with all products
     */
    public static function getProducts($page, $limit)
    {
        global $entity_manager;

        $page -= 1;

        return $entity_manager->getRepository("Entities\Product")->findBy(
            array(),
            array('id' => 'ASC'),
            $limit,
            $page * $limit
        );
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
     * Counts all products
     * 
     * @return int Products count
     */
    public static function getProductsCount()
    {
        global $entity_manager;

        $qb = $entity_manager->createQueryBuilder();

        $qb->select($qb->expr()->count('p'))
        ->from('Entities\Product', 'p');

        $query = $qb->getQuery();

        return $query->getSingleScalarResult();
    }
}
