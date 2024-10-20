<?php
namespace App\Public\StoreProducts\Services;
use PHPUnit\Framework\TestCase;
use App\Public\StoreProducts\Services\SessionService;
use App\Public\StoreProducts\Services\Service;
use \DateTime;

final class SessionServiceTest extends TestCase 
{
  public function testCrearSessionService()
  { 
    $sessionService = new SessionService('Fiesta Pop', 4);
    $this->assertEquals('Fiesta Pop', $sessionService->getName());
    $this->assertEquals(4, $sessionService->getnSession());
  }

  public function testAddSessionandDeleteSession() 
  {
    $sessionService = new SessionService('Fiesta Pop', 4);
    $sessionService->addSession();
    $this->assertEquals(5, $sessionService->getnSession());
    $sessionService->deleteSession();
    $this->assertEquals(4, $sessionService->getnSession());
  }

}