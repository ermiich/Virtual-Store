<?php

namespace App\Public;

$showResults = 'valid_perishables';
if (empty($_GET['filter'])):
  header("Location: index.php/?filter=all");
else:
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Virtual</title>
  <link rel="stylesheet" type="text/css" href="../Style/base.css">
  <link rel="stylesheet" type="text/css" href="../Style/card.css">
</head>

<body>
  <?php
    require_once "./showNavbar.php";
    switch ($_GET['filter']) {
      case 'all':
        require_once "./showAllStoreItems.php";
        break;

      case 'services':
        require_once "Partials\showServices.php";
        break;

      case 'products':
        require_once "./showAllProducts.php";
        break;

      case 'allperishables':
        require_once "Partials\showPerishables.php";
        break;

      case 'valid_perishables':
        require_once "Partials\showValidPerishables.php";

      default:
        break;
    }

    ?>
</body>

</html>
<?php endif; ?>