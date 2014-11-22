<?php

namespace MH3U\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table(name="mh3u_location")
 * @ORM\Entity(repositoryClass="MH3U\LocationBundle\Entity\Repository\LocationRepository")
 */
class Location
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\LocationBundle\Entity\LocationPlace", cascade={"persist"})
     */
    private $place;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\LocationBundle\Entity\LocationArea", cascade={"persist"})
     */
    private $area;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\LocationBundle\Entity\LocationRank", cascade={"persist"})
     */
    private $rank;


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
     * Set place
     *
     * @param \MH3U\LocationBundle\Entity\LocationPlace $place
     * @return Location
     */
    public function setPlace(\MH3U\LocationBundle\Entity\LocationPlace $place = null)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return \MH3U\LocationBundle\Entity\LocationPlace 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set area
     *
     * @param \MH3U\LocationBundle\Entity\LocationArea $area
     * @return Location
     */
    public function setArea(\MH3U\LocationBundle\Entity\LocationArea $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \MH3U\LocationBundle\Entity\LocationArea 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set rank
     *
     * @param \MH3U\LocationBundle\Entity\LocationRank $rank
     * @return Location
     */
    public function setRank(\MH3U\LocationBundle\Entity\LocationRank $rank = null)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return \MH3U\LocationBundle\Entity\LocationRank 
     */
    public function getRank()
    {
        return $this->rank;
    }
}
