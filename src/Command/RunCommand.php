<?php

namespace PhpInvariant\Command;

use PhpInvariant\Reporter\ConsoleReporter;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
use PhpInvariant\Runner\Runner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends Command
{
    public function __construct(
        private Runner $runner,
        private ConsoleReporter $consoleReporter
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'run';


    protected function configure(): void
    {
        $this->setDescription('Run invariants checks');

        $this->addArgument('path', InputArgument::REQUIRED, 'Directory with invariant checks or invariant test filename');
        $this->addOption('seed', null, InputOption::VALUE_OPTIONAL, 'Random seed');

        $this->setHelp('This command runs invariants checks');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = new RunnerConfiguration(
            $input->getArgument('path'),
            $input->getOption('seed')
        );
        $result = $this->runner->runChecks($config);
        $this->consoleReporter->report($result);
        return Command::SUCCESS;
    }
}
