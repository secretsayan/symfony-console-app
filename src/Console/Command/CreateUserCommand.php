<?php
namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command {

  protected static $defaultName = 'app:create-user';

  private $userName;

  public function __construct(string $userName = NULL) {
    $this->userName = $userName;
    parent::__construct();
  }

  protected function configure(): void
  {
    $this
      // If you don't like using the $defaultDescription static property,
      // you can also define the short description using this method:
       ->setDescription('Creates a new user.')
      // Set Alias to make the command handy
       ->setAliases(['uc'])
      // the command help shown when running the command with the "--help" option
       ->setHelp('This command allows you to create a user...')
      // Add argument
       ->addArgument('username' , InputArgument::REQUIRED , "The user to be created")
       ->addArgument('password' , InputArgument::REQUIRED , "The password required for the user to login")
       ->addArgument('email' , InputArgument::REQUIRED , 'Email address of the user');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    // outputs multiple lines to the console (adding "\n" at the end of each line)
    $output->writeln([
      'User Creator',
      '============',
      '',
    ]);

    // the value returned by someMethod() can be an iterator (https://secure.php.net/iterator)
    // that generates and returns the messages with the 'yield' PHP keyword
    //$output->writeln($this->someMethod());

    // outputs a message followed by a "\n"
    $output->writeln('Whoa!');

    // outputs a message without adding a "\n" at the end of the line
    $output->write('You are about to create user '
      . $input->getArgument('username')
      . ' with password '
      . $input->getArgument('password')
      . ' and with email '
      . $input->getArgument('email')
    );


    return Command::SUCCESS;
  }

}