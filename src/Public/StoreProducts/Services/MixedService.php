<?php

namespace App\Public\StoreProducts\Services;

use \DateTime;
use \DateInterval;

include_once "Service.php";
class MixedService extends Service
{
  public int $nSessions;
  private $eventDate = null;

  public function __construct(string $name, int $nSessions)
  {
    parent::__construct($name);
    $this->eventDate = DateTime::createFromFormat('Y-m-d', '0-0-0');
    $this->nSessions = $nSessions;
  }

  /**
   * Set the expiration Date.
   *
   * @param  int $day   
   * @param  int $month 
   * @param  int $year  
   */
  public function setExpirationDate(int $day, int $month, int $year)
  {
    $this->eventDate->setTime(0, 0, 0);
    $this->eventDate->setDate($year, $month, $day);
  }

  /**
   * add Sessions
   *
   * @return void
   */
  public function addSession()
  {
    $this->nSessions++;
  }

  /**
   * delete Sessions
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
  /**
   * show amount of Sessions and the name
   *
   * @return void
   */
  public function  showSessions()
  {
    return $this->nSessions . " " . parent::getName() . " el mes de " . $this->eventDate->format('F');
  }

  /**
   * Returns number of days left.
   *
   * @return int 
   */
  public function getDaysLeft(): int
  {
    if (!$this->isMixedCompleted()) {
      $interval = $this->dateDiff();
      return ((int)$interval->days);
    } else {
      return -1;
    }
  }

  /**
   * Check if event has happened
   *
   * @return bool
   */
  public function isMixedCompleted(): bool
  {
    $interval = $this->dateDiff();
    if ($interval->invert == 1 || $interval->d <= 0) {
      return true;
    }
    return false;
  }

  /**
   * Return the current date.
   *
   * @return DateTime
   */
  public function getCurrDate(): DateTime
  {
    $aux = new DateTime();
    return $aux;
  }

  /**
   * Return the difference between current date and event date.
   *
   * @return DateInterval
   */
  public function dateDiff(): DateInterval
  {
    $interval = $this->getCurrDate()->diff($this->getEventDate());
    return $interval;
  }

  /**
   * Return mixed date.
   *
   * @return DateTime
   */
  public function getEventDate(): DateTime
  {
    return $this->eventDate;
  }
}
