<?php

use App\Public\StoreProducts\Perishable;
use App\Public\StoreProducts\Services\Event;
use App\Public\StoreProducts\Services\MixedService;

require_once ".\StoreProducts\Perishable.php";
require_once ".\StoreProducts\Services\Event.php";
require_once ".\StoreProducts\Services\MixedService.php";
require_once "storeItems.php";
?>
<h2>Perecederos</h2>
<div class="itemsContainer">
  <?php foreach ($storeProducts as $value):
    // ================================
    //  IMPRIMIR PRODUCTOS PERECEDEROS
    // ================================
    if ($value instanceof Perishable):
      if (!$value->isExpired()): ?>
  <div class="cardContainer">
    <h3 class="cardTitle"><?php echo $value->getName() ?></h3>
    <p class="cardDesc">
      <strong>Tipo: </strong> Producto perecedero
    </p>
    <p class="cardDesc">
      <strong>Fabricante: </strong><?php echo $value->getManufacturer() ?>
    </p>
    <p class="cardDesc">
      <strong>Peso: </strong><?php echo $value->getWeight() . ' Kg'  ?>
    </p>
    <p class="cardDesc">
      <strong>Volumen: </strong><?php echo $value->getWeight() . ' cm3' ?>
    </p>
    <p class="cardDesc">
      <strong>Precio: </strong><?php echo $value->getBasePrice() . ' €' ?>
    </p>
    <p class="cardDesc">
      <strong>Precio Venta: </strong><?php echo $value->getSalePrice() . ' €' ?>
    </p>
    <p class="cardDesc">
      <strong>Coste del envío: </strong><?php echo $value->getShippingCost() . ' €' ?>
    </p>
    <p class="cardDesc">
      <strong>Fecha de caducidad: </strong><?php echo $value->getExpirationDate()->format('d/m/Y') ?>
    </p>
    <p class="cardDesc">
      <strong>Descuento: </strong><?php echo ($value->getDiscount() * 100) . " %" ?>
    </p>
    <p class="cardDesc" style="text-align: center;">
      <strong style="color:green">No caducado</strong>
    </p>
  </div>
  <?php endif; ?>
  <?php endif; ?>

  <?php
    // ==================
    //  IMPRIMIR EVENTOS
    // ==================
    if ($value instanceof Event):
      if (!$value->isEventCompleted()): ?>
  <div class="cardContainer">
    <h3 class="cardTitle"><?php echo $value->getName() ?></h3>
    <p class="cardDesc">
      <strong>Tipo: </strong> Evento
    </p>
    <p class="cardDesc">
      <strong>Fecha del Evento: </strong><?php echo $value->getEventDate()->format('d/m/Y') ?>
    </p>
    <p class="cardDesc">
      <strong>Dias restantes: </strong><?php echo $value->getDaysLeft() ?>
    </p>
    <p class="cardDesc">
      <strong>Precio: </strong><?php echo $value->getSalePrice() . ' €' ?>
    </p>
    <p class="cardDesc">
      <strong>Incremento: </strong><?php echo ($value->getIncrement() * 100) . ' %' ?>
    </p>
    <p class="cardDesc" style="text-align: center;">
      <strong style="color:green">No caducado</strong>
    </p>
  </div>
  <?php endif; ?>
  <?php endif;
    // =====
    // FIN
    // =====
    ?>
  <?php
    // ==================
    //  IMPRIMIR MIXTOS
    // ==================
    if ($value instanceof MixedService):
      if (!$value->isMixedCompleted()): ?>
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
    <p class="cardDesc">
      <strong>Dias restantes: </strong><?php echo $value->getDaysLeft() ?>
    </p>
    <p class="cardDesc" style="text-align: center;">
      <strong style="color:green">No caducado</strong>
    </p>
  </div>
  <?php endif; ?>
  <?php endif;
    // =====
    // FIN
    // =====
    ?>
  <?php endforeach; ?>
</div>