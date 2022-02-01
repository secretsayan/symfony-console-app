<?php

namespace App\Tests\Console\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;

abstract class CommandTestBase extends TestCase {

  /**
   * Creates a command object to test.
   *
   * @return \Symfony\Component\Console\Command\Command
   *   A command object with mocked dependencies injected.
   */
  abstract protected function createCommand(): Command;

  /**
   * Executes a given command with the command tester.
   *
   * @param array $args
   *   The command arguments.
   * @param string[] $inputs
   *   An array of strings representing each input passed to the command input
   *   stream.
   */
  protected function executeCommand(array $args = [], array $inputs = []): void {
    $tester = $this->getCommandTester();
    $tester->setInputs($inputs);
    $command_name = $this->createCommand()::getDefaultName();
    $args = array_merge(['command' => $command_name], $args);
    $tester->execute($args);
  }

}
