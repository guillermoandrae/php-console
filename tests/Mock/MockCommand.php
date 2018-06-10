<?php

namespace GuillermoandraeTest\Mock;

use Guillermoandrae\Commands\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MockCommand extends AbstractCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->fail($output, 'stuff broke');
    }
}
