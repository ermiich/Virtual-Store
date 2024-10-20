<?php
namespace App\Public\StoreProducts\Services;
use PHPUnit\Framework\TestCase;
use App\Public\StoreProducts\Services\MixedService;
use App\Public\StoreProducts\Services\Service;
use \DateTime;

final class MixedServiceTest extends TestCase 
{
  public function testCrearMixedService()
  { 
    $mixedService = new MixedService('Fiesta Pop', 4);
    $format = DateTime::createFromFormat('Y-m-d', '0-0-0');
    $this->assertEquals('Fiesta Pop', $mixedService->getName());
    $this->assertEquals(4, $mixedService->nSessions);
    $this->assertEquals($format, $mixedService->getEventDate());

  }

  public function testAddSessionandDeleteSession() 
  {
    $mixedService = new MixedService('Fiesta Pop', 4);
    $mixedService->addSession();
    $this->assertEquals(5, $mixedService->nSessions);
    $mixedService->deleteSession();
    $this->assertEquals(4, $mixedService->nSessions);
  }

  public function testgetDaysLeft() {
    $mixedServices = new MixedService('Fiesta Pop', 4);
    $this->assertEquals(-1, $mixedServices->getDaysLeft());
    $event->setExpirationDate(24,10,2024);
    $this->assertEquals(3, $mixedServices->getDaysLeft());
  }
}