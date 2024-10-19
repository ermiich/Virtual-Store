<?php

namespace App\Public\StoreProducts\Services;

include_once "Service.php";
class SesionService extends Service{
  private int $nSessions;

  public function __construct(string $name, int $nSessions)
  {
    parent::__construct($name);
    $this->nSessions = $nSessions;
  }
  
  /**
   * add Sessions
   *
   * @return void
   */
  public function addSessions () {
    $this->nSession++;
  }
  
  /**
   * delete Sessions
   *
   * @return void
   */
  public function deleteSessions () {
    $this->nSession--;
  }
  
  /**
   * show Sessions
   *
   * @return void
   */
  public function  showSessions () {
    return $this->nSession + " " +$this->name;
  }

    /**
   * Return session name.
   *
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Set session name.
   *
   * @param string $name
   */
  public function setName(string $name)
  {
    $this->name = $name;
  }

      /**
   * Return session number of sessions.
   *
   * @return string
   */
  public function getnSession(): int
  {
    return $this->nSessions;
  }

    /**
   * Set session number of sessions.
   *
   * @param string $name
   */
  public function setnSession(int $nSessions)
  {
    $this->name = $name;
  }

}