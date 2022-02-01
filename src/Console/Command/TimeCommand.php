<?php
namespace App\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Console\Command\Helper\TimeCommandHelper;
use Symfony\Component\Console\Command\Command;

class TimeCommand extends Command
{

  /**
   * @var \App\Console\Command\Helper\TimeCommandHelper
   */
  private $timeCommandHelper;

  /**
   * @param \App\Console\Command\Helper\TimeCommandHelper $timeCommandHelper
   */
  public function __construct(TimeCommandHelper $timeCommandHelper) {
    $this->timeCommandHelper = $timeCommandHelper;
    parent::__construct();
  }

  public function configure(): void
    {
        $this -> setName('greet')
            -> setDescription('Greet a user based on the time of the day.')
            -> setHelp('This command allows you to greet a user based on the time of the day...')
            -> addArgument('username', InputArgument::REQUIRED, 'The username of the user.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this ->timeCommandHelper->greetUser($input, $output);
        return 0;
    }
}
