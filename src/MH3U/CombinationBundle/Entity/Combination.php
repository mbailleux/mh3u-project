<?php

namespace MH3U\CombinationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Combination
 *
 * @ORM\Table(name="mh3u_combination")
 * @ORM\Entity(repositoryClass="MH3U\CombinationBundle\Entity\CombinationRepository")
 */
class Combination
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\ItemBundle\Entity\Item", cascade={"persist"})
     */
    private $itemA;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\ItemBundle\Entity\Item", cascade={"persist"})
     */
    private $itemB;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\ItemBundle\Entity\Item", cascade={"persist"})
     */
    private $itemResult;

    /**
     * @var integer
     *
     * @ORM\Column(name="percent", type="integer")
     */
    private $percent;

    /**
     * @var String
     *
     * @ORM\Column(name="quantity", type="string", length=255)
     */
    private $quantity;

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
     * Set percent
     *
     * @param integer $percent
     * @return Combination
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Get percent
     *
     * @return integer 
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Combination
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set itemA
     *
     * @param \MH3U\ItemBundle\Entity\Item $itemA
     * @return Combination
     */
    public function setItemA(\MH3U\ItemBundle\Entity\Item $itemA = null)
    {
        $this->itemA = $itemA;

        return $this;
    }

    /**
     * Get itemA
     *
     * @return \MH3U\ItemBundle\Entity\Item
     */
    public function getItemA()
    {
        return $this->itemA;
    }

    /**
     * Set itemB
     *
     * @param \MH3U\ItemBundle\Entity\Item $itemB
     * @return Combination
     */
    public function setItemB(\MH3U\ItemBundle\Entity\Item $itemB = null)
    {
        $this->itemB = $itemB;

        return $this;
    }

    /**
     * Get itemB
     *
     * @return \MH3U\ItemBundle\Entity\Item
     */
    public function getItemB()
    {
        return $this->itemB;
    }

    /**
     * Set itemResult
     *
     * @param \MH3U\ItemBundle\Entity\Item $itemResult
     * @return Combination
     */
    public function setItemResult(\MH3U\ItemBundle\Entity\Item $itemResult = null)
    {
        $this->itemResult = $itemResult;

        return $this;
    }

    /**
     * Get itemResult
     *
     * @return \MH3U\ItemBundle\Entity\Item
     */
    public function getItemResult()
    {
        return $this->itemResult;
    }
}
