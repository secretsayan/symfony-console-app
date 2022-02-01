<?php
namespace App\Console\Command;

use App\Options\CreateUserOptionsFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command {

  protected static $defaultName = 'app:create-user';

  /**
   * @var \App\Options\CreateUserOptionsFactory
   */
  private $createUserOptionsFactory;

  /**
   * @param \App\Options\CreateUserOptionsFactory $createUserOptionsFactory
   */
  public function __construct(CreateUserOptionsFactory $createUserOptionsFactory) {
    //$this->userName = $userName;
    $this->createUserOptionsFactory = $createUserOptionsFactory;
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
    $section = $output->section();

    $section->writeln("This is the top section");
    // outputs multiple lines to the console (adding "\n" at the end of each line)
    $output->writeln([
      'User Creator',
      '============',
      '',
    ]);

    // Check the options
    $options = $this->createUserOptionsFactory->create([
      'username' => $input->getArgument('username'),
      'password' => $input->getArgument('password'),
      'email' => $input->getArgument('email')
    ]);

    // @todo Create user in back end

    // the value returned by someMethod() can be an iterator (https://secure.php.net/iterator)
    // that generates and returns the messages with the 'yield' PHP keyword
    //$output->writeln($this->someMethod());

    // outputs a message followed by a "\n"
    $output->writeln('Data verifed ! User creation Process Initiated successful!!');

/*    // outputs a message without adding a "\n" at the end of the line
    $output->write('You are about to create user '
      . $options['username']
      . ' with password '
      . $options['password']
      . ' and with email '
      . $options['email']
    );*/



    return Command::SUCCESS;
  }

}