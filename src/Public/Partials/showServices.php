<?php
namespace App\Public\Partials;

use App\Public\StoreProducts\Services\MixedService;
use App\Public\StoreProducts\Services\Event;
use App\Public\StoreProducts\Services\NormalService;
use App\Public\StoreProducts\Services\SessionService;


require_once ".\StoreProducts\Services\MixedService.php";
require_once ".\StoreProducts\Services\Event.php";
require_once ".\StoreProducts\Services\NormalService.php";
require_once ".\StoreProducts\Services\SessionService.php";

$mixedService = new MixedService("Partido De Futbol", 5);
$mixedService2 = new MixedService("Concierto", 300);

$event = new Event("Danza Contemporanea");
$event2 = new Event("Dormir");

$normalService = new NormalService("Fiesta Años 80", 3000, 'Manufacturer');
$normalService2 = new NormalService("Aniversario", 5000, 'ManuDfacturer');

$sessionService = new SessionService("Fiesta en la piscina", 5);
$sessionService2 = new SessionService("Actuacion para niños", 2);
$storeServices = [
  $mixedService,
  $mixedService2,

  $event,
  $event2,

  $$normalService,
  $normalService2,

  $sessionService,
  $sessionService2,
];

foreach ($storeServices as $value) {
  if ($value instanceof Service){
    echo $value->getName();
    echo '<p>';
  }
  echo $value->showSessions();
  echo '<p>';
}