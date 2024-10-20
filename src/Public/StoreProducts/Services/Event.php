<?php

namespace App\Public\StoreProducts\Services;

include_once "Service.php";

use \DateTime;
use \DateInterval;

class Event extends Service
{
  private $eventDate = null;
  public function __construct(string $name)
  {
    parent::__construct($name);
    $this->eventDate = DateTime::createFromFormat('Y-m-d', '0-0-0');
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
   * Returns number of days left.
   *
   * @return int 
   */
  public function getDaysLeft(): int
  {
    if (!$this->isEventCompleted()) {
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
  public function isEventCompleted(): bool
  {
    $interval = $this->dateDiff();
    if ($interval->invert == 1 || $interval->d <= 0) {
      return true;
    }
    return false;
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
   * Return event date.
   *
   * @return DateTime
   */
  public function getEventDate(): DateTime
  {
    return $this->eventDate;
  }
}
