<?php

namespace App\Command;

use App\Entity\PriceMsc;
use App\Services\Pricer\Message\ParserMessage;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'test:pricer',
    description: 'Запуск парсинга прайс-листов',
)]
class TestPricerCommand extends Command
{
    public function __construct(
        private readonly MessageBusInterface $bus,
        private readonly ManagerRegistry $em
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption('clear', 'c', InputArgument::OPTIONAL, 'clear price_MSC table');
        $this->addOption('big', 'b', InputArgument::OPTIONAL, 'use big price');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($input->getOption('clear')) {
            return $this->clearTable($output);
        }
        $fileName = $input->getOption('clear') ? '/app/share/csv/FRO2-big.csv' : '/app/share/csv/FRO2.csv';

        $this->bus->dispatch(
            new ParserMessage(
                fileName: $fileName,
                delimiter: ';'
            )
        );

        return Command::SUCCESS;
    }

    private function clearTable(OutputInterface $output)
    {
        $this->em->getRepository(PriceMsc::class)->clearTable();
        $output->write("table price_MSC cleared\n");

        return Command::SUCCESS;
    }
}
