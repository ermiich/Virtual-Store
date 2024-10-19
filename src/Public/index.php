<?php

namespace App\Public;

$showResults = 'prod';



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Virtual</title>
  <link rel="stylesheet" type="text/css" href="./Style/card.css">
  <link rel="stylesheet" type="text/css" href="./Style/base.css">
</head>

<body>
  <?php
  switch ($showResults) {
    case 'all':
      
      break;
    case 'prod':
      require_once "./showAllProducts.php";

    default:
      break;
  }
  ?>
</body>

</html>