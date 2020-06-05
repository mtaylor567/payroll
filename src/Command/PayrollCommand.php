<?php


namespace App\Command;

use App\Components\Export\Csv;
use App\Payroll\Schedule\Schedule;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PayrollCommand extends ContainerAwareCommand
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:payroll:schedule')
            ->setDescription('Monthly payroll schedule list')
            ->setHelp('');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $exportDir = $this->getContainer()->getParameter('export_directory');
            $filename = $exportDir . '/' . sprintf('payroll-schedule-%d.csv', time());

            $list = Schedule::calculateList(new \DateTime(), 12);
            Csv::toFile($filename, $list);
        } catch (\Exception $e) {
            $output->write(sprintf('Error: %s', $e->getMessage()));
        }

        $output->write(sprintf('Schedule list exported to file: %s%s', $filename, PHP_EOL));
    }
}