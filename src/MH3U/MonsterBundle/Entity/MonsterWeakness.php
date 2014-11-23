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

    /**
     * Set type
     *
     * @param string $type
     * @return MonsterWeakness
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set monsterPartNum
     *
     * @param integer $monsterPartNum
     * @return MonsterWeakness
     */
    public function setMonsterPartNum($monsterPartNum)
    {
        $this->monsterPartNum = $monsterPartNum;

        return $this;
    }

    /**
     * Get monsterPartNum
     *
     * @return integer 
     */
    public function getMonsterPartNum()
    {
        return $this->monsterPartNum;
    }

    /**
     * Set cut
     *
     * @param integer $cut
     * @return MonsterWeakness
     */
    public function setCut($cut)
    {
        $this->cut = $cut;

        return $this;
    }

    /**
     * Get cut
     *
     * @return integer 
     */
    public function getCut()
    {
        return $this->cut;
    }

    /**
     * Set impact
     *
     * @param integer $impact
     * @return MonsterWeakness
     */
    public function setImpact($impact)
    {
        $this->impact = $impact;

        return $this;
    }

    /**
     * Get impact
     *
     * @return integer 
     */
    public function getImpact()
    {
        return $this->impact;
    }

    /**
     * Set shot
     *
     * @param integer $shot
     * @return MonsterWeakness
     */
    public function setShot($shot)
    {
        $this->shot = $shot;

        return $this;
    }

    /**
     * Get shot
     *
     * @return integer 
     */
    public function getShot()
    {
        return $this->shot;
    }

    /**
     * Set fire
     *
     * @param integer $fire
     * @return MonsterWeakness
     */
    public function setFire($fire)
    {
        $this->fire = $fire;

        return $this;
    }

    /**
     * Get fire
     *
     * @return integer 
     */
    public function getFire()
    {
        return $this->fire;
    }

    /**
     * Set water
     *
     * @param integer $water
     * @return MonsterWeakness
     */
    public function setWater($water)
    {
        $this->water = $water;

        return $this;
    }

    /**
     * Get water
     *
     * @return integer 
     */
    public function getWater()
    {
        return $this->water;
    }

    /**
     * Set ice
     *
     * @param integer $ice
     * @return MonsterWeakness
     */
    public function setIce($ice)
    {
        $this->ice = $ice;

        return $this;
    }

    /**
     * Get ice
     *
     * @return integer 
     */
    public function getIce()
    {
        return $this->ice;
    }

    /**
     * Set thunder
     *
     * @param integer $thunder
     * @return MonsterWeakness
     */
    public function setThunder($thunder)
    {
        $this->thunder = $thunder;

        return $this;
    }

    /**
     * Get thunder
     *
     * @return integer 
     */
    public function getThunder()
    {
        return $this->thunder;
    }

    /**
     * Set dragon
     *
     * @param integer $dragon
     * @return MonsterWeakness
     */
    public function setDragon($dragon)
    {
        $this->dragon = $dragon;

        return $this;
    }

    /**
     * Get dragon
     *
     * @return integer 
     */
    public function getDragon()
    {
        return $this->dragon;
    }

    /**
     * Set knockout
     *
     * @param integer $knockout
     * @return MonsterWeakness
     */
    public function setKnockout($knockout)
    {
        $this->knockout = $knockout;

        return $this;
    }

    /**
     * Get knockout
     *
     * @return integer 
     */
    public function getKnockout()
    {
        return $this->knockout;
    }

    /**
     * Set monster
     *
     * @param \MH3U\MonsterBundle\Entity\Monster $monster
     * @return MonsterWeakness
     */
    public function setMonster(\MH3U\MonsterBundle\Entity\Monster $monster = null)
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
     * Set monsterPart
     *
     * @param \MH3U\MonsterBundle\Entity\MonsterPart $monsterPart
     * @return MonsterWeakness
     */
    public function setMonsterPart(\MH3U\MonsterBundle\Entity\MonsterPart $monsterPart = null)
    {
        $this->monsterPart = $monsterPart;

        return $this;
    }

    /**
     * Get monsterPart
     *
     * @return \MH3U\MonsterBundle\Entity\MonsterPart 
     */
    public function getMonsterPart()
    {
        return $this->monsterPart;
    }
}
