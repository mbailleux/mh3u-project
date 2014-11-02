<?php

namespace MH3U\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table(name="mh3u_item")
 * @ORM\Entity(repositoryClass="MH3U\ItemBundle\Entity\Repository\ItemRepository")
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

//    /**
//     * @ORM\OneToOne(targetEntity="MH3U\ItemBundle\Entity\ItemGroup", cascade={"persist"})
//     **/
//    private $group;

    /**
     * @var integer
     *
     * @ORM\Column(name="rarity", type="integer")
     */
    private $rarity;

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
     * Set id
     *
     * @return Object
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * @param string $rarity
     * @return Object
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;

        return $this;
    }

    /**
     * Get rarity
     *
     * @return string 
     */
    public function getRarity()
    {
        return $this->rarity;
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

//    /**
//     * Set group
//     *
//     * @param \MH3U\ItemBundle\Entity\ItemGroup $group
//     * @return Item
//     */
//    public function setGroup(\MH3U\ItemBundle\Entity\ItemGroup $group = null)
//    {
//        $this->group = $group;
//
//        return $this;
//    }
//
//    /**
//     * Get group
//     *
//     * @return \MH3U\ItemBundle\Entity\ItemGroup
//     */
//    public function getGroup()
//    {
//        return $this->group;
//    }
}
