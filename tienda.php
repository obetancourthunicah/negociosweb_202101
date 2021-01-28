<?php 
  require_once "autoloader.php";

  use Tienda\{FProductos};

  $arrEntradas= array();
  $arrEntradas[] = FProductos::crearProducto("Entrada","01","Crema de Papa",100, 0.15);
  $arrEntradas[] = FProductos::crearProducto("Entrada", "02", "Crema de Brocoli", 150, 0.15);
  $arrEntradas[] = FProductos::crearProducto("Entrada", "03", "Crema de Trufas", 1000, 0.15);
  $arrEntradas[] = FProductos::crearProducto("Entrada", "04", "Crema de Zanahora", 120, 0.15);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiendita de la Tía</title>
</head>
<body>
  <h1>Tiendita de la Tía</h1>
  <?php
    foreach($arrEntradas as $entrada){
      echo $entrada->getNombre() . "|" . $entrada->getPrecio()."<br/>";
    }
  ?>
</body>
</html>
