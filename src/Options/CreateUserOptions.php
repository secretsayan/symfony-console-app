<?php

namespace App\Options;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Encapsulates Create User Options
 */
class CreateUserOptions {

  /**
   * The resolved options.
   *
   * @var array
   */
  private $options;

  public function __construct(array $options){
    $this->resolve($options);
  }

  private function resolve(array $options) : void {

    $this->options = (new OptionsResolver())
      // Set Defined
      ->setDefined([])
      // Set Required
      ->setRequired([])
      // Set allowed types
      ->setAllowedTypes()
      // Set allowed values
      ->setAllowedValues()
      // Resolve
      ->resolve($options);

  }
}
