<?php

namespace Entities;

use SmartShop\Cookie;
use SmartShop\Entity;

/**
 * @Entity
 * @Table(name="ss_cart")
 */
class Cart extends Entity
{
    /**
     * {@inheritdoc}
     */
    protected static $repository = "Entities\Cart";
    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @OneToMany(targetEntity="CartContent", mappedBy="cart", cascade={"all"})
     * @var Doctrine\Common\Collection\ArrayCollection
     */
    private $cart_contents;

    /**
     * @var Cart Cart instance for current context
     */
    private static $cart;

    /**
     * Initializes static variable with cart ID
     */
    public static function init()
    {
        global $entity_manager;
        $id_cart = Cookie::get('id_cart');

        if(!$id_cart) {
            self::$cart = self::create();
            Cookie::set('id_cart', self::$cart->getId());
        } else {
            self::$cart = $entity_manager->find("Entities\Cart", $id_cart);
        }
    }

    /**
     * Creates new instance of cart and assign it to current customer
     */
    public static function reinit()
    {
        Cookie::unset('id_cart');
        self::init();
    }

    /**
     * Creates new Cart instance
     * 
     * @return Entities\Cart new Cart instance
     */
    public static function create()
    {
        global $entity_manager;

        $cart = new self();
        $entity_manager->persist($cart);
        $entity_manager->flush();

        return $cart;
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

    /**
     * Adds product to cart
     * 
     * @param int $id_product Product ID
     * 
     * @return int ID of cart content
     */
    public function addProduct($id_product)
    {
        global $entity_manager;

        $cart_content = $this->getCartContentByProductId($id_product);
        if($cart_content !== false) {
            $current_quantity = $cart_content->getQuantity();
            $cart_content->setQuantity($current_quantity + 1);

            $result = $cart_content->getId();
        } else {
            $product = $entity_manager->find("Entities\Product", $id_product);
            $cart_content = (new CartContent())
                ->setIdProduct($product->getId())
                ->setProductName($product->getName())
                ->setProductPrice($product->getPrice())
                ->setCart($this)
                ->setQuantity(1);
            
            $result = $cart_content->getId();
        }

        $entity_manager->persist($cart_content);
        return $result;
    }

    /**
     * Gets product from cart by id product if exists
     * 
     * @param int $id_product Product ID
     * 
     * @return CartContent|false Cart content where product exists or false when product is not in the cart
     */
    public function getCartContentByProductId($id_product)
    {
        global $entity_manager;
        $cartContent = $entity_manager
            ->getRepository("Entities\CartContent")
                ->findBy([
                    'id_product' => $id_product, 
                    'cart' => $this
                ]);
        if(!empty($cartContent)) {
            return $cartContent[0];
        } 

        return false;
    }

    /**
     * Returns whether is empty or not
     * 
     * @return bool Is cart empty
     */
    public function isEmpty()
    {
        return $this->cart_contents->isEmpty();
    }

    /**
     * Returns Cart total
     * 
     * @return float Cart total
     */
    public function getCartTotal()
    {
        $cart_total = 0;
        foreach ($this->cart_contents as $cart_content) {
            $cart_total += $cart_content->getProductPrice() * $cart_content->getQuantity();
        }

        return $cart_total;
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
     * Constructor
     */
    public function __construct()
    {
        $this->cart_contents = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cartContent.
     *
     * @param \Entities\CartContent $cartContent
     *
     * @return Cart
     */
    public function addCartContent(\Entities\CartContent $cartContent)
    {
        $this->cart_contents[] = $cartContent;

        return $this;
    }

    /**
     * Remove cartContent.
     *
     * @param \Entities\CartContent $cartContent
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCartContent(\Entities\CartContent $cartContent)
    {
        return $this->cart_contents->removeElement($cartContent);
    }

    /**
     * Get cartContents.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCartContents()
    {
        return $this->cart_contents;
    }
}
