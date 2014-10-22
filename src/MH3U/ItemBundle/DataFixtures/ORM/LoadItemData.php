<?php

namespace MH3U\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MH3U\ItemBundle\Entity\Item;

class LoadItemData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $item = new Item();
        $item->setName("Potion");
        $item->setRank(1);
        $item->setCapacity(10);
        $item->setPricePurchase(66);
        $item->setPriceSale(7);

        $manager->persist($item);

        $item = new Item();
        $item->setName("Mega Potion");
        $item->setRank(2);
        $item->setCapacity(10);
        $item->setPricePurchase(null);
        $item->setPriceSale(16);

        $manager->persist($item);

        $item = new Item();
        $item->setName("Honey");
        $item->setRank(2);
        $item->setCapacity(10);
        $item->setPricePurchase(90);
        $item->setPriceSale(45);

        $manager->persist($item);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
} 