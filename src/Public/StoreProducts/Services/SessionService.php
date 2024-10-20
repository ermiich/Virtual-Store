<?php

namespace App\Public\StoreProducts\Services;

include_once "Service.php";
class SessionService extends Service
{
  private int $nSessions;

  public function __construct(string $name, int $nSessions)
  {
    parent::__construct($name);
    $this->nSessions = $nSessions;
  }

  /**
   * add 1 Sessions
   *
   * @return void
   */
  public function addSession()
  {
    $this->nSessions++;
  }

  /**
   * remove 1 Sessions
   *
   * @return void
   */
  public function deleteSession()
  {
    $this->nSessions--;
  }

  /**
   * show Sessions
   *
   * @return void
   */
  public function  showSession()
  {
    return $this->nSessions + " " + parent::getName();
  }



  /**
   * Return number of sessions.
   *
   * @return string
   */
  public function getnSession(): int
  {
    return $this->nSessions;
  }

  /**
   * Set number of sessions.
   *
   * @param string $nSessions
   */
  public function setnSession(int $nSessions)
  {
    $this->nSessions = $nSessions;
  }
}
