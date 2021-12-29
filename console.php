#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\Command\TimeCommand;

$application = new Application();

// register commands
$application->add(new TimeCommand());

$application->run();
