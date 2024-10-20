<?php
namespace App\Public\StoreProducts;
use PHPUnit\Framework\TestCase;
use App\Public\StoreProducts\Product;

final class ProductTest extends TestCase
{
    public function testCrearProduct()
    { 
      $product = new Product('Pollo Frito', 20, 'Juan', 20, 30);
      $this->assertEquals('Pollo Frito', $product->getName());
      $this->assertEquals(20, $product->getBasePrice());
      $this->assertEquals('Juan', $product->getManufacturer());
      $this->assertEquals(20, $product->getWeight());
      $this->assertEquals(30, $product->getVolume());
      $this->assertEquals(0.07, $product->getTax());
    }

    public function testGetSalePrice()
    { 
      $product = new Product('Pollo Frito', 20, 'Juan', 20, 30);
      $this->assertEquals(21.4, $product->getSalePrice());
    }

    public function testGetShippingCost()
    {
      $product = new Product('Pollo Frito', 20, 'Juan', 20, 30);
      $this->assertEquals(2.03, $product->getShippingCost());
    }
}