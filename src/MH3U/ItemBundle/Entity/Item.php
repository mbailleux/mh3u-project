<?php

namespace MH3U\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table(name="mh3u_item")
 * @ORM\Entity(repositoryClass="MH3U\ItemBundle\Entity\ItemRepository")
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer", nullable=true)
     */
    private $capacity;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_sale", type="integer", nullable=true)
     */
    private $priceSale;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_purchase", type="integer", nullable=true)
     */
    private $pricePurchase;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Object
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set rank
     *
     * @param string $rank
     * @return Object
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return string 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Object
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set priceSale
     *
     * @param integer $priceSale
     * @return Object
     */
    public function setPriceSale($priceSale)
    {
        $this->priceSale = $priceSale;

        return $this;
    }

    /**
     * Get priceSale
     *
     * @return integer 
     */
    public function getPriceSale()
    {
        return $this->priceSale;
    }

    /**
     * Set pricePurchase
     *
     * @param integer $pricePurchase
     * @return Object
     */
    public function setPricePurchase($pricePurchase)
    {
        $this->pricePurchase = $pricePurchase;

        return $this;
    }

    /**
     * Get pricePurchase
     *
     * @return integer 
     */
    public function getPricePurchase()
    {
        return $this->pricePurchase;
    }
}
