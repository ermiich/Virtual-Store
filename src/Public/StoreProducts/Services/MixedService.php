<?php
namespace App\Public\StoreProducts\Services;

use \DateTime;

include_once "Service.php";
class MixedService extends Service{
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
  public function setExpDate(int $day, int $month, int $year)
  {
    $this->eventDate->setTime(0, 0, 0);
    $this->eventDate->setDate($year, $month, $day);
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
   * show amount of Sessions and the name
   *
   * @return void
   */
  public function  showSessions () {
    return $this->nSessions . " " . getName() . " el mes de " . $this->eventDate->format('F');
  }

    /**
   * Returns number of days left.
   *
   * @return int 
   */
  public function daysLeft(): int
  {
    if (!$this->isMixCompleted()) {
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
  public function isMixCompleted(): bool
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
   * Return mixed name.
   *
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Set mixed name.
   *
   * @param string $name
   */
  public function setName(string $name)
  {
    $this->name = $name;
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