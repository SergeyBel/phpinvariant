<?php

namespace PhpInvariant\Command;

use PhpInvariant\Runner\Dto\RunnerConfiguration;
use PhpInvariant\Runner\Runner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends Command
{
    public function __construct(
        private Runner $runner
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'run';


    protected function configure(): void
    {
        $this->addOption('dir', null, InputOption::VALUE_REQUIRED);
        $this->addOption('seed', null, InputOption::VALUE_OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = new RunnerConfiguration(
            $input->getOption('dir'),
            $input->getOption('seed')
        );
        $this->runner->runTests($config);
        return Command::SUCCESS;
    }
}
