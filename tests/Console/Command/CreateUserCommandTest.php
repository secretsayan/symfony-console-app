<?php

namespace App\Tests\Console\Command;

use App\Console\Command\CreateUserCommand;
use App\Options\CreateUserOptionsFactory;
use Symfony\Component\Console\Command\Command;

class CreateUserCommandTest extends CommandTestBase {

  /**
   * @inerhitDoc
   */
  protected function setUp(): void {
    $this->createUserOptionsFactory = $this->prophesize(CreateUserOptionsFactory::class);
  }

  /**
   * @return \Symfony\Component\Console\Command\Command
   */
  protected function createCommand(): Command {
    $createUserOptionsFactory = $this->createUserOptionsFactory->reveal();
    return new CreateUserCommand($createUserOptionsFactory);
  }

  /**
   * Tests basic configurations of the command.
   */
  protected function testBasicConfiguration(): void {
    // Load command
    $command = $this->createCommand();

    $definitions = $command->getDefinition();
    $arguments = $definitions->getArguments();
    $options = $definitions->getOptions();

    self::assertEquals("app:create-user", $command->getName(), "Set correct name");
    self::assertEquals(["init"], $command->getAliases(), "Set correct aliases");
    self::assertNotEmpty($command->getDescription(), "Set a description");
    self::assertEquals(['username', 'password', 'email'], array_keys($arguments), "Set correct arguments");
    self::assertEquals([], array_keys($options), "Set correct options");

  }

}
