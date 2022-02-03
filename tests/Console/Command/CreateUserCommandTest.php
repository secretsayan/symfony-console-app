<?php

namespace App\Tests\Console\Command;

use Acquia\Orca\Enum\StatusCodeEnum;
use App\Console\Command\CreateUserCommand;
use App\Options\CreateUserOptions;
use App\Options\CreateUserOptionsFactory;
use http\Exception;
use Prophecy\Argument;
use Symfony\Component\Console\Command\Command;
use Prophecy\Exception\InvalidArgumentException;

class CreateUserCommandTest extends CommandTestBase
{

    private $createUserOptionsFactory;
    private $createUseroptions;

    /**
     * @inerhitDoc
     */
    protected function setUp(): void
    {
        $this->createUserOptionsFactory = $this->prophesize(CreateUserOptionsFactory::class);
        $this->createUseroptions = $this->prophesize(CreateUserOptions::class);
    }

    /**
     * @return \Symfony\Component\Console\Command\Command
     */
    protected function createCommand(): Command
    {
        $createUserOptionsFactory = $this->createUserOptionsFactory->reveal();
        return new CreateUserCommand($createUserOptionsFactory);
    }

    /**
     * @covers ::__construct
     * @covers ::configure
     */
    public function testBasicConfiguration(): void
    {
        // Load command
        $command = $this->createCommand();

        $definitions = $command->getDefinition();
        $arguments = $definitions->getArguments();
        $options = $definitions->getOptions();

        self::assertEquals("app:create-user", $command->getName(), "Set correct name");
        self::assertEquals(["uc"], $command->getAliases(), "Set correct aliases");
        self::assertNotEmpty($command->getDescription(), "Set a description");
        self::assertEquals(['username', 'password', 'email'], array_keys($arguments), "Set correct arguments");
        self::assertEquals([], array_keys($options), "Set correct options");

    }

    public function testSuccess(): void
    {
        $this->createUserOptionsFactory->create(Argument::any())
            ->willReturn($this->createUseroptions->reveal())
            ->shouldBeCalledOnce();

        $this->executeCommand(['username' => 'sample', 'password' => 'sample', 'email' => 'email'], []);

        self::assertEquals('0', $this->getStatusCode(), 'Returned correct status code.');
        self::assertEquals('Data verified ! User creation Process Initiated successful!!', $this->getDisplay(), 'Displayed correct output.');

    }

    public function testFailure(): void
    {
        $this->createUserOptionsFactory->create(Argument::any())
            ->willThrow(InvalidArgumentException::class)
            ->shouldBeCalledOnce();

        $this->executeCommand(['username' => 'sample', 'password' => 'sample', 'email' => 'email'], []);

        self::assertEquals('2', $this->getStatusCode(), 'Returned correct status code.');
        self::assertEquals('Incorrect arguments', $this->getDisplay(), 'Displayed correct output.');

    }

}
