<?php

namespace PhpInvariant\Reporter;

use PhpInvariant\Runner\Dto\RunnerResult;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;

class ConsoleReporter
{
    public function report(RunnerResult $result): void
    {
        $io = new SymfonyStyle(new ArgvInput(), new ConsoleOutput());
        $io->writeln('PHPInvariant');
        $runsCount = $result->getRunsCount();
        $successRunsCount = $result->getSuccessRunsCount();
        $percentage = number_format($successRunsCount / $runsCount * 100, 2, '.');
        $io->writeln($successRunsCount .'/'.$runsCount.' ('.$percentage.'%)');
        $io->writeln('(tests: '.$result->getTestCount().', runs: '.$result->getRunsCount().', failed: '.$result->getErrorsCount().')');
        $io->success('');
    }
}
