<?php
namespace MH3U\DataBundle\Service;

use Ddeboer\DataImport\Reader\CsvReader;
use Symfony\Component\DependencyInjection\Container;
use MH3U\DataBundle\Service\DataTranslation;
use MH3U\ItemBundle\Entity\Item;
use MH3U\CombinationBundle\Entity\Combination;

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
        $connection->executeUpdate($connection->getDatabasePlatform()->getTruncateTableSQL("mh3u_combination"));
        $connection->executeUpdate("SET FOREIGN_KEY_CHECKS=1;");
    }

    private function _importData()
    {
        $this->_importItemData();
        $this->_importItemNameData();
        $this->_importCombinationData();
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

} 