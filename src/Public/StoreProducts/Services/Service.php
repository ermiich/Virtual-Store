<?php

namespace App\Public\StoreProducts\Services;

class Service
{
  private string $name;
  /**
   * Service constructor.
   *
   * @param  mixed $name
   * @return void
   */
  public function __construct(string $name)
  {
    $this->name = $name;
  }
  /**
   * Return event name.
   *
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }
  /**
   * Set event name.
   *
   * @param string $name
   */
  public function setName(string $name)
  {
    $this->name = $name;
  }
}
