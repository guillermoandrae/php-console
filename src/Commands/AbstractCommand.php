<?php

namespace Guillermoandrae\Commands;

use ICanBoogie\Inflector;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCommand extends Command
{
    /**
     * Configues the command. By default, uses the class name to derive the
     * command name.
     */
    protected function configure()
    {
        preg_match('/(\w+)Command/', get_class($this), $matches);
        if (isset($matches[1])) {
            $name = Inflector::get()->hyphenate($matches[1]);
            $this->setName($name);
        }
    }

    /**
     * Outputs the desired failure message.
     *
     * @param OutputInterface $output  The output instance.
     * @param string $message  The failure message.
     */
    final protected function fail(OutputInterface $output, string $message)
    {
        $output->writeln(
            sprintf('<fg=red;options=bold>An error occurred:</> <fg=red>%s</>', $message)
        );
        echo PHP_EOL;
    }
}
