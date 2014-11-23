<?php

namespace MH3U\MonsterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table(name="mh3u_monster_weakness")
 * @ORM\Entity(repositoryClass="MH3U\MonsterBundle\Entity\Repository\MonsterWeaknessRepository")
 */
class MonsterWeakness
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\MonsterBundle\Entity\Monster", cascade={"persist"})
     */
    private $monster;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="part_num", type="integer")
     */
    private $monsterPartNum;

    /**
     * @ORM\ManyToOne(targetEntity="MH3U\MonsterBundle\Entity\MonsterPart", cascade={"persist"})
     */
    private $monsterPart;

    /**
     * @var integer
     *
     * @ORM\Column(name="cut", type="integer")
     */
    private $cut;

    /**
     * @var integer
     *
     * @ORM\Column(name="impact", type="integer")
     */
    private $impact;

    /**
     * @var integer
     *
     * @ORM\Column(name="shot", type="integer")
     */
    private $shot;

    /**
     * @var integer
     *
     * @ORM\Column(name="fire", type="integer")
     */
    private $fire;

    /**
     * @var integer
     *
     * @ORM\Column(name="water", type="integer")
     */
    private $water;

    /**
     * @var integer
     *
     * @ORM\Column(name="ice", type="integer")
     */
    private $ice;

    /**
     * @var integer
     *
     * @ORM\Column(name="thunder", type="integer")
     */
    private $thunder;

    /**
     * @var integer
     *
     * @ORM\Column(name="dragon", type="integer")
     */
    private $dragon;

    /**
     * @var integer
     *
     * @ORM\Column(name="knockout", type="integer")
     */
    private $knockout;

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
}
