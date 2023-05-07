<?php

namespace PhpInvariant\Command;

use PhpInvariant\Config\ConfigurationParser;
use PhpInvariant\Reporter\ConsoleReporter;
use PhpInvariant\Runner\Runner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CheckCommand extends Command
{
    public function __construct(
        private Runner $runner,
        private ConsoleReporter $consoleReporter,
        private ConfigurationParser $configurationParser
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'check';


    protected function configure(): void
    {
        $this->setDescription('Run invariants checks');

        $this->addOption('path', null, InputOption::VALUE_OPTIONAL, 'Specifies directory with Check classes');
        $this->addOption('seed', null, InputOption::VALUE_OPTIONAL, 'Specifies seed for random');
        $this->addOption('no-progress', null, InputOption::VALUE_NONE, 'Do not show progress bar');
        $this->addOption('config', null, InputOption::VALUE_OPTIONAL, 'Specifies the path to a configuration file');

        $this->setHelp('Runs invariants checks');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = $this->configurationParser->parseConfiguration($input);
        $result = $this->runner->runChecks($config);
        $this->consoleReporter->report($result, $config);
        return Command::SUCCESS;
    }
}
