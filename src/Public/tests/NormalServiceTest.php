<?php
namespace App\Public\StoreProducts\Services;
use PHPUnit\Framework\TestCase;
use App\Public\StoreProducts\Services\NormalService;
use App\Public\StoreProducts\Services\Service;

final class NormalServiceTest extends TestCase 
{
  public function testCrearMixedService()
  { 
    $normalService = new NormalService('Fiesta Pop', 300, 'Juan');
    $this->assertEquals('Fiesta Pop', $normalService->getName());
    $this->assertEquals(300, $normalService->getBasePrice());
    $this->assertEquals('Juan', $normalService->getManufacturer());
    $this->assertEquals(0.07, $normalService->getTax());
  }

  public function testGetSalePrice()
  { 
    $normalService = new NormalService('Fiesta Pop', 300, 'Juan');
    $this->assertEquals(321, $normalService->getSalePrice());
  }
}