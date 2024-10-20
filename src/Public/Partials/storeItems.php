<?php

namespace App\Public\Partials;

use App\Public\StoreProducts\Perishable;
use App\Public\StoreProducts\Product;
use App\Public\StoreProducts\Services\Event;
use App\Public\StoreProducts\Services\MixedService;
use App\Public\StoreProducts\Services\NormalService;
use App\Public\StoreProducts\Services\SessionService;


require_once ".\StoreProducts\Perishable.php";
require_once ".\StoreProducts\Product.php";
require_once ".\StoreProducts\Services\Event.php";
require_once ".\StoreProducts\Services\NormalService.php";
require_once ".\StoreProducts\Services\MixedService.php";
require_once ".\StoreProducts\Services\SessionService.php";
/*
  ============
    Productos
  ============
    - 2 Productos normales.
    - 3 Productos perecederos (caducado, caducado en 2-3 dias, que caduque en 20-25 dias).
*/

$prod1 = new Product("Móvil", 499.99, "Apple", 0.5, 2000);
$prod2 = new Product("Pórtatil", 999.99, "Hp", 5, 10000);

$prodPerishable1 = new Perishable("1KG de carne", 5, "Matadero Juan", 1, 3000);
$prodPerishable1->setExpirationDate(4, 9, 2024);

$prodPerishable2 = new Perishable("2KG de carne", 10, "Matadero Juan", 2, 6000);
$prodPerishable2->setExpirationDate(21, 10, 2024);

$prodPerishable3 = new Perishable("3KG de carne", 15, "Matadero Juan", 3, 9000);
$prodPerishable3->setExpirationDate(15, 11, 2024);

/*
  ============
    Servicios
  ============
    - 3 eventos: uno caducado, otro que caduque hoy y otro que caduque en unos meses.
    - 2 servicios por sesiones: uno al que le quedan pocas sesiones y otro al que no le queda ninguna.
    - 2 servicios mixtos: uno caducado y otro no.
    - 2 servicios normales
*/

$event1 = new Event("Danza Contemporánea", 49.99);
$event1->setExpirationDate(4, 9, 2024);

$event2 = new Event("Concierto de rock", 79.95);
$event2->setExpirationDate(21, 10, 2024);

$event3 = new Event("Festival", 120.00);
$event3->setExpirationDate(15, 11, 2024);


$sessionService = new SessionService("Fiesta en la piscina", 5);
$sessionService->addSession();

$sessionService2 = new SessionService("Actuacion para niños", 2);
$sessionService->deleteSession();

$mixedService = new MixedService("Partido De Futbol", 5);
$mixedService->setExpirationDate(6, 7, 2024);
$mixedService->addSession();

$mixedService2 = new MixedService("Concierto", 300);
$mixedService2->setExpirationDate(15, 11, 2024);
$mixedService2->deleteSession();

$normalService = new NormalService("Epub El Quijote", 19.99, "Santillana");
$normalService2 = new NormalService("Albúm Digital", 9.99, "Sony Music");



/*
  ===============================================
    PRODUCTOS O SERVICIOS GUARDADOS EN UN ARRAY
  ===============================================
*/
$storeProducts = [
  $prod1,
  $prod2,

  $prodPerishable1,
  $prodPerishable2,
  $prodPerishable3,

  $event1,
  $event2,
  $event3,

  $sessionService,
  $sessionService2,

  $mixedService,
  $mixedService2,

  $normalService,
  $normalService2,

];
