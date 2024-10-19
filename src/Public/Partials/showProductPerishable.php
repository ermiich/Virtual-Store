<?php

namespace App\Public\Partials;

require_once "storeItems.php";
?>
<div class="itemsContainer">
  <?php foreach ($storePerishableProducts as $value): ?>
    <div class="cardContainer">
      <h3 class="cardTitle"><?php echo $value->getName() ?></h3>

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
        <?php if ($value->isExpired()): ?>
          <strong style="color:crimson">Caducado</strong>
        <?php else : ?>
          <strong style="color:green">No caducado</strong>
        <?php endif; ?>
      </p>

    </div>
  <?php endforeach; ?>
</div>