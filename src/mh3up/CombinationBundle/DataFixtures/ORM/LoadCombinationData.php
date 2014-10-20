<?php

namespace mh3up\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use mh3up\CombinationBundle\Entity\Combination;

class LoadCombinationData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $doctrine = $this->container->get('doctrine')->getManager();
        $combination = new Combination();

        $itemA = $doctrine->getRepository('mh3upItemBundle:Item')->findOneByName('Potion');
        $itemB = $doctrine->getRepository('mh3upItemBundle:Item')->findOneByName('Honey');
        $itemResult = $doctrine->getRepository('mh3upItemBundle:Item')->findOneByName('Mega Potion');

        $combination->setItemA($itemA);
        $combination->setItemB($itemB);
        $combination->setItemResult($itemResult);
        $combination->setPercent(90);
        $combination->setQuantity(1);

        $manager->persist($combination);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
} 