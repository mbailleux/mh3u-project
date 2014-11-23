<?php
namespace MH3U\DataBundle\Service;

use Ddeboer\DataImport\Reader\CsvReader;
use MH3U\DataBundle\Service\DataTranslation;
use MH3U\ItemBundle\Entity\Item;
use MH3U\CombinationBundle\Entity\Combination;
use MH3U\ItemBundle\Entity\ItemLocation;
use MH3U\ItemBundle\Entity\ItemLocationType;
use MH3U\LocationBundle\Entity\Location;
use MH3U\LocationBundle\Entity\LocationArea;
use MH3U\LocationBundle\Entity\LocationPlace;
use MH3U\CoreBundle\Entity\Rank;
use Symfony\Component\DependencyInjection\Container;

class DataImport {

    private $_doctrineManager;

    public function __construct(Container $containerService)
    {
        $this->_doctrineManager = $containerService->get('doctrine')->getManager();
    }

    private function _openCVSReader($fileName)
    {
        $file = new \SplFileObject(__DIR__.$fileName);
        return new CsvReader($file, ';');
    }

    public function executeService()
    {
        $this->_dropData();
        $this->_importData();
    }

    private function _dropData()
    {
        $connection = $this->_doctrineManager->getConnection();
        $connection->executeUpdate("SET FOREIGN_KEY_CHECKS=0;");
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_item"));
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_item_location"));
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_item_location_type"));
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_combination"));
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_location"));
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_location_area"));
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_location_place"));
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_rank"));
        $connection->executeUpdate("SET FOREIGN_KEY_CHECKS=1;");
    }

    private function _importData()
    {
        $this->_importItemData();
        $this->_importItemNameData();
        $this->_importItemLocationTypeData();
        $this->_importCombinationData();
        $this->_importLocationAreaData();
        $this->_importLocationPlaceData();
        $this->_importRankData();
        $this->_importLocationData();
        $this->_importItemLocationData();
    }

    private function _importItemData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_ITEM.csv');

        $reader->setHeaderRowNumber(0);

        foreach ($reader as $row) {
            $newItem = new Item();
            $newItem->setId($row['id']);
            $newItem->setRarity($row['rarity']);
            $newItem->setCapacity($row['capacity']);
            $newItem->setPriceSale($row['priceSale']);
            $newItem->setPricePurchase($row['pricePurchase']);
            $this->_doctrineManager->persist($newItem);
        }
        $this->_doctrineManager->flush();
    }

    private function _importItemNameData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_ITEM_NAME.csv');
        $reader->setHeaderRowNumber(0);

        $translationFile = new DataTranslation('ItemBundle', 'item');

        foreach ($reader as $row) {
            $translationId = $translationFile->createTranslationId($row['en_US']);
            $item = $this->_doctrineManager->getRepository('MH3UItemBundle:Item')->find($row['item_id']);
            $item->setName($translationId);
            $translationFile->addTranslations($translationId, $row['en_US'], $row['fr_FR']);
        }
        $this->_doctrineManager->flush();
    }

    private function _importCombinationData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_COMBINATION.csv');

        $reader->setHeaderRowNumber(0);

        foreach ($reader as $row) {
            $itemResult = $this->_doctrineManager->getRepository('MH3UItemBundle:Item')->find($row['itemResultId']);
            $itemA      = $this->_doctrineManager->getRepository('MH3UItemBundle:Item')->find($row['itemAId']);
            $itemB      = $this->_doctrineManager->getRepository('MH3UItemBundle:Item')->find($row['itemBId']);

            $newCombination = new Combination();
            $newCombination->setId($row['id']);
            $newCombination->setItemResult($itemResult);
            $newCombination->setItemA($itemA);
            $newCombination->setItemB($itemB);
            $newCombination->setPercent($row['percent']);
            $newCombination->setQuantity($row['quantity']);
            $this->_doctrineManager->persist($newCombination);
        }
        $this->_doctrineManager->flush();
    }

    private function _importLocationAreaData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_LOCATION_AREA.csv');

        $reader->setHeaderRowNumber(0);

        $translationFile = new DataTranslation('LocationBundle', 'location_area');

        foreach ($reader as $row) {
            $translationId = $translationFile->createTranslationId($row['en_US']);
            $translationFile->addTranslations($translationId, $row['en_US'], $row['fr_FR']);

            $newLocationArea = new LocationArea();
            $newLocationArea->setId($row['area_id']);
            $newLocationArea->setName($translationId);
            $this->_doctrineManager->persist($newLocationArea);
        }
        $this->_doctrineManager->flush();
    }

    private function _importLocationPlaceData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_LOCATION_PLACE.csv');

        $reader->setHeaderRowNumber(0);

        $translationFile = new DataTranslation('LocationBundle', 'location_place');

        foreach ($reader as $row) {
            $translationId = $translationFile->createTranslationId($row['en_US']);
            $translationFile->addTranslations($translationId, $row['en_US'], $row['fr_FR']);

            $newLocationPlace = new LocationPlace();
            $newLocationPlace->setId($row['place_id']);
            $newLocationPlace->setName($translationId);
            $this->_doctrineManager->persist($newLocationPlace);
        }
        $this->_doctrineManager->flush();
    }

    private function _importRankData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_RANK.csv');

        $reader->setHeaderRowNumber(0);

        $translationFile = new DataTranslation('CoreBundle', 'rank');

        foreach ($reader as $row) {
            $translationId = $translationFile->createTranslationId($row['en_US']);
            $translationFile->addTranslations($translationId, $row['en_US'], $row['fr_FR']);

            $newRank = new Rank();
            $newRank->setId($row['rank_id']);
            $newRank->setName($translationId);
            $this->_doctrineManager->persist($newRank);
        }
        $this->_doctrineManager->flush();
    }

    private function _importLocationData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_LOCATION.csv');

        $reader->setHeaderRowNumber(0);

        foreach ($reader as $row) {
            $locationPlace  = $this->_doctrineManager->getRepository('MH3ULocationBundle:LocationPlace')->find($row['place_id']);
            $locationArea   = $this->_doctrineManager->getRepository('MH3ULocationBundle:LocationArea')->find($row['area_id']);
            $locationRank   = $this->_doctrineManager->getRepository('MH3UCoreBundle:Rank')->find($row['rank_id']);

            $location = new Location();
            $location->setId($row['id']);
            $location->setPlace($locationPlace);
            $location->setArea($locationArea);
            $location->setRank($locationRank);
            $this->_doctrineManager->persist($location);
        }
        $this->_doctrineManager->flush();
    }

    private function _importItemLocationTypeData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_ITEM_LOCATION_TYPE.csv');

        $reader->setHeaderRowNumber(0);

        $translationFile = new DataTranslation('ItemBundle', 'item_location_type');

        foreach ($reader as $row) {
            $translationId = $translationFile->createTranslationId($row['en_US']);
            $translationFile->addTranslations($translationId, $row['en_US'], $row['fr_FR']);

            $newItemLocationType = new ItemLocationType();
            $newItemLocationType->setId($row['item_location_type_id']);
            $newItemLocationType->setName($translationId);
            $this->_doctrineManager->persist($newItemLocationType);
        }
        $this->_doctrineManager->flush();
    }

    private function _importItemLocationData()
    {
        $reader = $this->_openCVSReader('/Data/MH3U_ITEM_LOCATION.csv');

        $reader->setHeaderRowNumber(0);

        foreach ($reader as $row) {
            $location           = $this->_doctrineManager->getRepository('MH3ULocationBundle:Location')->find($row['location_id']);
            $item               = $this->_doctrineManager->getRepository('MH3UItemBundle:Item')->find($row['item_id']);
            $itemLocationType   = $this->_doctrineManager->getRepository('MH3UItemBundle:ItemLocationType')->find($row['item_location_type_id']);

            $newItemLocation = new ItemLocation();
            $newItemLocation->setItem($item);
            $newItemLocation->setLocation($location);
            $newItemLocation->setType($itemLocationType);
            $this->_doctrineManager->persist($newItemLocation);
        }
        $this->_doctrineManager->flush();
    }
} 