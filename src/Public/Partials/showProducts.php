<?php

namespace App\Public\Partials;

require_once "storeItems.php";
?>
<div class="itemsContainer">
  <?php foreach ($storeProducts as $value): ?>
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
  </div>
  <?php endforeach; ?>
</div>