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
        $io->writeln('Seed: '.$result->getConfiguration()->seed);

        if ($result->hasErrors()) {
            $number = 1;
            foreach ($result->getErrorRuns() as $error) {
                $io->writeln('');
                $io->writeln($number.'. Test: '.$error->testName.':'.$error->methodName);
                $io->writeln('Message: '.$error->message);
                $io->writeln('Trace:');
                $io->writeln($error->trace);
                $number++;
            }

            $io->error('');
        } else {
            $io->success('');
        }

        $this->statisticsBlock($io, $result);
    }

    private function statisticsBlock(SymfonyStyle $io, RunnerResult $result): void
    {
        $runsCount = $result->getRunsCount();
        $successRunsCount = $result->getSuccessRunsCount();
        $percentage = number_format($successRunsCount / $runsCount * 100, 2, '.');
        $io->writeln('Finished');
        $io->writeln($successRunsCount .'/'.$runsCount.' ('.$percentage.'%)');
        $io->writeln('(Tests: '.$result->getTestCount().', Runs: '.$result->getRunsCount().', Failed: '.$result->getErrorsCount().')');
    }
}