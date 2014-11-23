<?php

namespace MH3U\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table(name="mh3u_item_Monster")
 * @ORM\Entity(repositoryClass="MH3U\ItemBundle\Entity\Repository\ItemMonsterRepository")
 */
class ItemMonster
{
    /**
     * @ORM\ManyToOne(targetEntity="MH3U\ItemBundle\Entity\Item", cascade={"persist"})
     * @ORM\Id
     */
    private $item;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\MonsterBundle\Entity\Monster", cascade={"persist"})
     * @ORM\Id
     */
    private $monster;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\ItemBundle\Entity\ItemMonsterType", cascade={"persist"})
     * @ORM\Id
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\CoreBundle\Entity\Rank", cascade={"persist"})
     * @ORM\Id
     */
    private $rank;

    /**
     * @var String
     *
     * @ORM\Column(name="quantity", type="string", length=255)
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="percent", type="integer")
     */
    private $percent;

    /**
     * Set item
     *
     * @param \MH3U\ItemBundle\Entity\Item $item
     * @return ItemMonster
     */
    public function setItem(\MH3U\ItemBundle\Entity\Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \MH3U\ItemBundle\Entity\Item 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set monster
     *
     * @param \MH3U\MonsterBundle\Entity\Monster $monster
     * @return ItemMonster
     */
    public function setMonster(\MH3U\MonsterBundle\Entity\Monster $monster)
    {
        $this->monster = $monster;

        return $this;
    }

    /**
     * Get monster
     *
     * @return \MH3U\MonsterBundle\Entity\Monster 
     */
    public function getMonster()
    {
        return $this->monster;
    }

    /**
     * Set type
     *
     * @param \MH3U\ItemBundle\Entity\ItemMonsterType $type
     * @return ItemMonster
     */
    public function setType(\MH3U\ItemBundle\Entity\ItemMonsterType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \MH3U\ItemBundle\Entity\ItemMonsterType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     * @return ItemMonster
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set percent
     *
     * @param integer $percent
     * @return ItemMonster
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
     * Set rank
     *
     * @param \MH3U\CoreBundle\Entity\Rank $rank
     * @return ItemMonster
     */
    public function setRank(\MH3U\CoreBundle\Entity\Rank $rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return \MH3U\CoreBundle\Entity\Rank 
     */
    public function getRank()
    {
        return $this->rank;
    }
}
