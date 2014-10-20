<?php

namespace mh3up\CombinationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Combination
 *
 * @ORM\Table(name="mh3u_combination")
 * @ORM\Entity(repositoryClass="mh3up\CombinationBundle\Entity\CombinationRepository")
 */
class Combination
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
     * @ORM\OneToOne(targetEntity="mh3up\ItemBundle\Entity\Item", cascade={"persist"})
     */
    private $itemA;

    /**
     * @ORM\OneToOne(targetEntity="mh3up\ItemBundle\Entity\Item", cascade={"persist"})
     */
    private $itemB;

    /**
     * @ORM\OneToOne(targetEntity="mh3up\ItemBundle\Entity\Item", cascade={"persist"})
     */
    private $itemResult;

    /**
     * @var integer
     *
     * @ORM\Column(name="percent", type="integer")
     */
    private $percent;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;




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
     * @param \mh3up\ItemBundle\Entity\Item $itemA
     * @return Combination
     */
    public function setItemA(\mh3up\ItemBundle\Entity\Item $itemA = null)
    {
        $this->itemA = $itemA;

        return $this;
    }

    /**
     * Get itemA
     *
     * @return \mh3up\ItemBundle\Entity\Item 
     */
    public function getItemA()
    {
        return $this->itemA;
    }

    /**
     * Set itemB
     *
     * @param \mh3up\ItemBundle\Entity\Item $itemB
     * @return Combination
     */
    public function setItemB(\mh3up\ItemBundle\Entity\Item $itemB = null)
    {
        $this->itemB = $itemB;

        return $this;
    }

    /**
     * Get itemB
     *
     * @return \mh3up\ItemBundle\Entity\Item 
     */
    public function getItemB()
    {
        return $this->itemB;
    }

    /**
     * Set itemResult
     *
     * @param \mh3up\ItemBundle\Entity\Item $itemResult
     * @return Combination
     */
    public function setItemResult(\mh3up\ItemBundle\Entity\Item $itemResult = null)
    {
        $this->itemResult = $itemResult;

        return $this;
    }

    /**
     * Get itemResult
     *
     * @return \mh3up\ItemBundle\Entity\Item 
     */
    public function getItemResult()
    {
        return $this->itemResult;
    }
}
