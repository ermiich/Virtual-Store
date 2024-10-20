<?php

namespace App\Public\Partials;

use App\Public\StoreProducts\Perishable;
use App\Public\StoreProducts\Product;
use App\Public\StoreProducts\Services\Event;
use App\Public\StoreProducts\Services\MixedService;
use App\Public\StoreProducts\Services\NormalService;
use App\Public\StoreProducts\Services\Service;
use App\Public\StoreProducts\Services\SessionService;


require_once ".\StoreProducts\Perishable.php";
require_once ".\StoreProducts\Product.php";
require_once ".\StoreProducts\Services\Event.php";
require_once ".\StoreProducts\Services\NormalService.php";
require_once ".\StoreProducts\Services\MixedService.php";
require_once ".\StoreProducts\Services\SessionService.php";
require_once "storeItems.php";
?>
<h2>Servicios</h2>

<div class="itemsContainer">

  <?php
  //Iteramos todos los items de la tienda.
  foreach ($storeProducts as $value):

    // ==================
    //  IMPRIMIR EVENTOS
    // ==================
    if ($value instanceof Event):
  ?>
  <div class="cardContainer">
    <h3 class="cardTitle"><?php echo $value->getName() ?></h3>
    <p class="cardDesc">
      <strong>Tipo: </strong> Evento
    </p>
    <p class="cardDesc">
      <strong>Fecha del Evento: </strong><?php echo $value->getEventDate()->format('d/m/Y') ?>
    </p>

    <?php if ($value->isEventCompleted()): ?>
    <p class="cardDesc" style="text-align: center;">
      <strong style="color:crimson">Caducado</strong>
    </p>
    <?php else : ?>
    <p class="cardDesc">
      <strong>Dias restantes: </strong><?php echo $value->getDaysLeft() ?>
    </p>
    <p class="cardDesc">
      <strong>Incremento: </strong><?php echo ($value->getIncrement() * 100) . ' %' ?>
    </p>
    <p class="cardDesc" style="text-align: center;">
      <strong style="color:green">No caducado</strong>
    </p>
    <?php endif; ?>
  </div>
  <?php endif;
    // =====
    //  FIN
    // =====
    ?>

  <?php
    // ===================
    //  IMPRIMIR SESIONES
    // ===================
    if ($value instanceof SessionService): ?>

  <div class="cardContainer">
    <h3 class="cardTitle"><?php echo $value->getName() ?></h3>
    <p class="cardDesc">
      <strong>Tipo: </strong> Servicio Mixto
    </p>
    <p class="cardDesc">
      <strong>Nº sesiones restantes: </strong> <?php echo $value->getnSession() ?>
    </p>
  </div>
  <?php endif;
    // =====
    //  FIN
    // =====
    ?>

  <?php
    // ==================
    //  IMPRIMIR MIXTOS
    // ==================
    if ($value instanceof MixedService): ?>

  <div class="cardContainer">
    <h3 class="cardTitle"><?php echo $value->getName() ?></h3>
    <p class="cardDesc">
      <strong>Tipo: </strong> Servicio Mixto
    </p>

    <p class="cardDesc">
      <strong>Nº sesiones restantes: </strong> <?php echo $value->getnSession() ?>
    </p>
    <p class="cardDesc">
      <strong>Fecha límite: </strong><?php echo $value->getEventDate()->format('d/m/Y') ?>
    </p>
    <?php if ($value->isMixedCompleted()): ?>

    <p class="cardDesc" style="text-align: center;">
      <strong style="color:crimson">Caducado</strong>
    </p>
    <?php else : ?>
    <p class="cardDesc">
      <strong>Dias restantes: </strong><?php echo $value->getDaysLeft() ?>
    </p>
    <p class="cardDesc" style="text-align: center;">
      <strong style="color:green">No caducado</strong>
    </p>
    <?php endif; ?>
  </div>
  <?php endif;
    // =====
    //  FIN
    // =====
    ?>

  <?php
    // ==================
    //  IMPRIMIR NORMALES
    // ==================
    if ($value instanceof NormalService): ?>
  <div class="cardContainer">
    <h3 class="cardTitle"><?php echo $value->getName() ?></h3>
    <p class="cardDesc">
      <strong>Fabricante: </strong><?php echo $value->getManufacturer() ?>
    </p>
    <p class="cardDesc">
      <strong>Precio: </strong><?php echo $value->getBasePrice() . ' €' ?>
    </p>
    <p class="cardDesc">
      <strong>Precio Venta: </strong><?php echo $value->getSalePrice() . ' €' ?>
    </p>
  </div>
  <?php endif;
  // =====
  //  FIN
  // =====
  endforeach; ?>
</div>