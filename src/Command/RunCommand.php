<?php

namespace PhpInvariant\Command;

use PhpInvariant\Config\ConfigurationParser;
use PhpInvariant\Exception\PhpInvariantException;
use PhpInvariant\Reporter\ConsoleReporter;
use PhpInvariant\Runner\Runner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Exception;

class RunCommand extends Command
{
    public function __construct(
        private Runner $runner,
        private ConsoleReporter $consoleReporter,
        private ConfigurationParser $configurationParser
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'run';


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
        $io = new SymfonyStyle($input, $output);
        try {
            $config = $this->configurationParser->parseConfiguration($input);
            $result = $this->runner->runChecks($config);
            $this->consoleReporter->report($result, $config);
        } catch (PhpInvariantException $e) {
            $io->error('Error: '.$e->getMessage());
            return Command::FAILURE;
        } catch (Exception $e) {
            $io->error('Fatal Error: '.$e->getMessage());
            $output->writeln($e->getTraceAsString());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
