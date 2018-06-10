<?php

namespace GuillermoandraeTest\Commands;

use Guillermoandrae\Commands\AbstractCommand;
use GuillermoandraeTest\Mock\MockCommand;

class CommandTest extends TestCase
{
    public function testConfigure()
    {
        $commandTester = $this->getCommandTester('mock');
        $output = $commandTester->getDisplay();
        $this->assertContains('stuff broke', $output);
    }

    public function testConfigureWithInvalidName()
    {
        $command = $this->getMockForAbstractClass(AbstractCommand::class, [], 'FakeThing');
        $this->assertNull($command->getName());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->application->add(new MockCommand());
    }
}
