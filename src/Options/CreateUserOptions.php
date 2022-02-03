<?php

namespace App\Options;

use phpDocumentor\Reflection\Types\Boolean;
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
  private array $options;

  public function __construct(array $options) {
    $this->resolve($options);
  }

    /**
     * @param array $options
     */
  private function resolve(array $options): void {

    $this->options = (new OptionsResolver())
      // Set Defined
      ->setDefined([
        'username',
        'password',
        'email',
      ])
      // Set Required
      ->setRequired([
        'username',
        'password',
        'email',
      ])
      // Set allowed types
      ->setAllowedTypes('username', 'string')
      ->setAllowedTypes('password', 'string')
      ->setAllowedTypes('email', 'string')
      // Set allowed values
      ->setAllowedValues('username', $this->isValidUsername())
      ->setAllowedValues('password', $this->isValidPassword())
      ->setAllowedValues('email', $this->isValidEmail())
      // Resolve
      ->resolve($options);

  }

  /**
   * @return bool
   */
  private function isValidUsername(): \Closure {
    return static function($value): bool{
      return TRUE;
    };
  }

  /**
   * @return bool
   */
  private function isValidPassword(): \Closure {
    return static function($value): bool{
      return TRUE;
    };
  }

  /**
   * @return bool
   */
  private function isValidEmail(): \Closure {
    return static function($value): bool{
      return TRUE;
    };
  }

}
