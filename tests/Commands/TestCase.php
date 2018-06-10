<?php

namespace GuillermoandraeTest\Commands;

use RuntimeException;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class TestCase extends PHPUnitTestCase
{
    /**
     * @var Application
     */
    protected $application;

    protected function setUp()
    {
        $this->application = new Application();
    }

    /**
     * Returns an instance of the command tester using the options provided.
     *
     * @param string $commandName  The name of the command being tested.
     * @param array $options  An array of options to pass to the command.
     * @return CommandTester
     * @throws RuntimeException
     */
    protected function getCommandTester(string $commandName, array $options = []): CommandTester
    {
        if (!$command = $this->getApplication()->find($commandName)) {
            throw new RuntimeException(
                sprintf('Please register the % command before attempting to test it.', $commandName)
            );
        }
        $commandTester = new CommandTester($command);
        $commandTester->execute(['command' => $commandName], $options);
        return $commandTester;
    }

    /**
     * Returns the application registered with this test.
     *
     * @return Application
     */
    protected function getApplication(): Application
    {
        return $this->application;
    }
}
