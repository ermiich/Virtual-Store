<?php

namespace App\Public\StoreProducts;




class Product
{
  private string $name;
  private float $basePrice;
  private string $manufacturer;
  private float $weight;
  private float $volume;
  private float $tax;

  /**
   * Product constructor.
   *
   * @param  string $name
   * @param  float $basePrice
   * @param  string $manufacturer
   * @param  float $weight
   * @param  float $volume
   * @param  float $tax
   */
  public function __construct(string $name, float $basePrice, string $manufacturer, float $weight, float $volume, $tax = 0.07)
  {
    $this->name = $name;
    $this->basePrice = $basePrice;
    $this->manufacturer = $manufacturer;
    $this->weight = $weight;
    $this->volume = $volume;
    $this->tax = $tax;
  }


  /**
   * Return the sale price.
   *
   * @return float
   */
  function getSalePrice(): float
  {
    return round($this->basePrice + ($this->basePrice * $this->tax), 2);
  }

  /**
   * Return the shipping cost.
   *
   * @return float
   */
  function getShippingCost(): float
  {
    return round(2 + ($this->weight * 0.0002) + ($this->volume / 1000), 2);
  }

  /**
   * Get product name.
   *
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }


  /**
   * Set product name.
   *
   * @param  string $name
   */
  public function setName(string $name)
  {
    $this->name = $name;
  }


  /**
   * Return product base price.
   *
   * @return float
   */
  public function getBasePrice(): float
  {
    return $this->basePrice;
  }


  /**
   * Set product base price.
   *
   * @param  float $basePrice
   */
  public function setBasePrice(float $basePrice)
  {
    $this->basePrice = $basePrice;
  }


  /**
   * Return the manufacturer.
   *
   * @return string
   */
  public function getManufacturer(): string
  {
    return $this->manufacturer;
  }

  /**
   * Set product manufacturer.
   *
   * @param  string $manufacturer
   */
  public function setManufacturer(string $manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }

  /**
   * Return product weight.
   *
   * @return float
   */
  public function getWeight(): float
  {
    return $this->weight;
  }

  /**
   * Set weight.
   *
   * @param  float $weight
   */
  public function setWeight(float $weight)
  {
    $this->weight = $weight;
  }

  /**
   * Return the volume.
   *
   * @return float
   */
  public function getVolume(): float
  {
    return $this->volume;
  }


  /**
   * Set product volume.
   *
   * @param  float $volume
   */
  public function setVolume(float $volume)
  {
    $this->volume = $volume;
  }

  /**
   * Get the product tax.
   *
   * @return float
   */
  public function getTax(): float
  {
    return $this->tax;
  }

  /**
   * Set product tax.
   *
   * @param  float $tax
   */
  public function setTax(float $tax)
  {
    $this->tax = $tax;
  }
}
