<?php
namespace App\Public\StoreProducts\Services;
use PHPUnit\Framework\TestCase;
use App\Public\StoreProducts\Services\Service;

final class ServiceTest extends TestCase 
{
  public function testCrearSessionService()
  { 
    $service = new Service('Fiesta Pop');
    $this->assertEquals('Fiesta Pop', $service->getName());
    $service->setName('Fiesta en la piscina');
    $this->assertEquals('Fiesta en la piscina', $service->getName());
  }
}