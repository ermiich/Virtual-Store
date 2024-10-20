<?php

namespace App\Public\StoreProducts\Services;

include_once "Service.php";
class SessionService extends Service
{
  private int $nSessions;

  /**
   * Session service constructor.
   *
   * @param  mixed $name
   * @param  mixed $nSessions
   * @return void
   */
  public function __construct(string $name, int $nSessions)
  {
    parent::__construct($name);
    $this->nSessions = $nSessions;
  }

  /**
   * Add 1 Session.
   *
   * @return void
   */
  public function addSession()
  {
    $this->nSessions++;
  }

  /**
   * Delete 1 Session.
   *
   * @return void
   */
  public function deleteSession()
  {
    $this->nSessions--;
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