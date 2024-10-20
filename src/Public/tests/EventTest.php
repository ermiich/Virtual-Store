<?php
namespace App\Public\StoreProducts\Services;
use PHPUnit\Framework\TestCase;
use App\Public\StoreProducts\Services\Event;
use App\Public\StoreProducts\Services\Service;
use \DateTime;

final class EventTest extends TestCase
{
    public function testCrearEvent()
    { 
      $event = new Event('Partido de Futbol', 400);
      $format = DateTime::createFromFormat('Y-m-d', '0-0-0');
      $this->assertEquals('Partido de Futbol', $event->getName());
      $this->assertEquals(400, $event->getBasePrice());
      $this->assertEquals($format, $event->getEventDate());
    }

    public function testGetSalePrice()
    { 
      $event = new Event('Partido de Futbol', 400);
      $this->assertEquals(428, $event->getSalePrice());
    }

    public function testgetDaysLeft() {
      $event = new Event('Partido de Futbol', 400);
      $this->assertEquals(-1, $event->getDaysLeft());
      $event->setExpirationDate(24,10,2024);
      $this->assertEquals(3, $event->getDaysLeft());
    }

    public function testgetIncrement() {
      $event = new Event('Partido de Futbol', 400);
      $this->assertEquals(0.0, $event->getIncrement());
      $event->setExpirationDate(24,10,2024);
      $this->assertEquals(0.2, $event->getIncrement());
      $event->setExpirationDate(22,10,2024);
      $this->assertEquals(0.5, $event->getIncrement());
    }
}
