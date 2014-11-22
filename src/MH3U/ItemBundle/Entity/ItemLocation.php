<?php

namespace MH3U\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table(name="mh3u_item_location")
 * @ORM\Entity(repositoryClass="MH3U\ItemBundle\Entity\Repository\ItemLocationRepository")
 */
class ItemLocation
{
    /**
     * @ORM\ManyToOne(targetEntity="MH3U\ItemBundle\Entity\Item", cascade={"persist"})
     * @ORM\Id
     */
    private $item;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\LocationBundle\Entity\Location", cascade={"persist"})
     * @ORM\Id
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\ItemBundle\Entity\ItemLocationType", cascade={"persist"})
     * @ORM\Id
     */
    private $type;

    /**
     * Set item
     *
     * @param \MH3U\ItemBundle\Entity\Item $item
     * @return ItemLocation
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
     * Set location
     *
     * @param \MH3U\LocationBundle\Entity\Location $location
     * @return ItemLocation
     */
    public function setLocation(\MH3U\LocationBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \MH3U\LocationBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set type
     *
     * @param \MH3U\ItemBundle\Entity\ItemLocationType $type
     * @return ItemLocation
     */
    public function setType(\MH3U\ItemBundle\Entity\ItemLocationType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \MH3U\ItemBundle\Entity\ItemLocationType
     */
    public function getType()
    {
        return $this->type;
    }
}
