<?php
namespace App\Public\StoreProducts;
use PHPUnit\Framework\TestCase;
use App\Public\StoreProducts\Perishable;
use App\Public\StoreProducts\Product;
use \DateTime;

final class PerishableTest extends TestCase
{
    public function testCrearPerishable()
    { 
      $perishable = new Perishable('Pollo Frito', 20, 'Juan', 20, 30);
      $format = DateTime::createFromFormat('Y-m-d', '0-0-0');
      $this->assertEquals('Pollo Frito', $perishable->getName());
      $this->assertEquals(15.0, $perishable->getBasePrice());
      $this->assertEquals('Juan', $perishable->getManufacturer());
      $this->assertEquals(20, $perishable->getWeight());
      $this->assertEquals(30, $perishable->getVolume());
      $this->assertEquals(0.07, $perishable->getTax());
      $this->assertEquals($format, $perishable->getExpirationDate());
    }

    public function testGetSalePrice()
    { 
      $perishable = new Perishable('Pollo Frito', 20, 'Juan', 20, 30);
      $this->assertEquals(21.4, $perishable->getSalePrice());
    }

    public function testgetExpirationDate()
    { 
      $perishable = new Perishable('Pollo Frito', 20, 'Juan', 20, 30);
      $this->assertEquals('30/11/-0001', $perishable->getExpirationDate()->format('d/m/Y'));
      $perishable->setExpirationDate(24,6,2003);
      $this->assertEquals('24/06/2003', $perishable->getExpirationDate()->format('d/m/Y'));
    }

    public function testGetDiscount()
    { 
      $perishable = new Perishable('Pollo Frito', 20, 'Juan', 20, 30);
      $this->assertEquals(0.25, $perishable->getDiscount());
      $this->assertEquals(25, $perishable->getDiscount() * 100);
    }
}