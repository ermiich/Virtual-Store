<?php

namespace App\Public\StoreProducts\Services;

include_once "Service.php";
class NormalService extends Service
{
  private float $basePrice;
  private string $manufacturer;
  private float $tax;

  public function __construct(string $name, float $basePrice, string $manufacturer, $tax = 0.07)
  {
    parent::__construct($name);
    $this->basePrice = $basePrice;
    $this->manufacturer = $manufacturer;
    $this->tax = $tax;
  }
  /**
   * Return the sale price.
   *
   * @return float
   */
  function getSalePrice()
  {
    return round($this->basePrice + ($this->basePrice * $this->tax), 2);
  }



  /**
   * Return service base price.
   *
   * @return float
   */
  public function getBasePrice(): float
  {
    return $this->basePrice;
  }

  /**
   * Set service base price.
   *
   * @param  float $basePrice
   */
  public function setBasePrice(float $basePrice)
  {
    $this->basePrice = $basePrice;
  }

  /**
   * Return the service manufacturer.
   *
   * @return string
   */
  public function getManufacturer(): string
  {
    return $this->manufacturer;
  }

  /**
   * Set service manufacturer.
   *
   * @param  string $manufacturer
   */
  public function setManufacturer(string $manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }


  /**
   * Get the servivce tax.
   *
   * @return float
   */
  public function getTax(): float
  {
    return $this->tax;
  }

  /**
   * Set servivce tax.
   *
   * @param  float $tax
   */
  public function setTax(float $tax)
  {
    $this->tax = $tax;
  }
}
