<?php

namespace App\Options;

use App\Options\CreateUserOptions;


class CreateUserOptionsFactory {
  public function create(array $options): CreateUserOptions{
    return new CreateUserOptions($options);
  }
}