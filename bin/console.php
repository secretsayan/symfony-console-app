#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Console\Command\TimeCommand;
use App\Console\Command\CreateUserCommand;

$application = new Application();

// register commands
$application->add(new TimeCommand());
$application->add(new CreateUserCommand());

$application->run();
