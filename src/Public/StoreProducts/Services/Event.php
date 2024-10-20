<?php

namespace App\Public\StoreProducts\Services;

include_once "Service.php";

use \DateTime;
use \DateInterval;

class Event extends Service
{
  private $eventDate = null;
  private float $firstDiscount = 0.20;
  private float $secondDiscount = 0.50;
  private float $basePrice;
  private float $tax;

  /**
   * Event Constructor.
   *
   * @param  mixed $name
   * @return void
   */
  public function __construct(string $name, float $basePrice, float $tax = 0.07)
  {
    parent::__construct($name);
    $this->basePrice = $basePrice;
    $this->tax = $tax;
    $this->eventDate = DateTime::createFromFormat('Y-m-d', '0-0-0');
  }
  /**
   * Return sale price.
   *
   * @return float
   */
  function getSalePrice(): float
  {
    return round($this->getBasePrice() + ($this->getBasePrice() * $this->tax), 2);
  }
  /**
   * Return discount.
   *
   * @return float
   */
  public function getIncrement(): float
  {
    $days = $this->getdaysToExpire();
    if ($days <= 7) {
      if ($days == 1) {
        return $this->secondDiscount;
      }
      return $this->firstDiscount;
    }
    return 0;
  }
  /**
   * Returns number of days to Expire.
   *
   * @return int 
   */
  public function getdaysToExpire(): int
  {
    $interval = $this->dateDiff();
    return ((int)$interval->days);
  }

  /**
   * Return base price with discount.
   *
   * @return float
   */
  public function getBasePrice(): float
  {

    return $this->basePrice + ($this->basePrice * $this->getIncrement());
  }
  /**
   * Set the value of basePrice
   *
   * @return  self
   */
  public function setBasePrice($basePrice)
  {
    $this->basePrice = $basePrice;
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
   * Return if event has happened.
   *
   * @return bool
   */
  public function isEventCompleted(): bool
  {
    $interval = $this->dateDiff();
    if ($interval->invert == 1) {
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
