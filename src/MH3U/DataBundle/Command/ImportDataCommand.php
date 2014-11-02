<?php

namespace MH3U\DataBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportDataCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('MH3U:import-data')
            ->setDescription('Import the Data into the application');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $service = $this->getContainer()->get('MH3U_import_data.service');
        $service->executeService();

//        foreach ($webSites as $webSite) {
//            try {
//
//                $output->writeln('<info>sql_technologies_aggregator.' . $webSite->getServiceName() . ' :  done;</info>');
//            } catch (Exception $e) {
//                $output->writeln('<info>sql_technologies_aggregator.' . $webSite->getServiceName() . ' :  failed;</info>');
//                $output->writeln('<error>' . $e . '</error>');
//            }
//        }
    }
}