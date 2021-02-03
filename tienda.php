<?php
require_once "autoloader.php";
session_start();
use Tienda\{FProductos, OrdenCompra};

$arrEntradas = array();
$arrEntradas["01"] = FProductos::crearProducto("Entrada", "01", "Crema de Papa", 100, 0.15);
$arrEntradas["02"] = FProductos::crearProducto("Entrada", "02", "Crema de Brocoli", 150, 0.15);
$arrEntradas["03"] = FProductos::crearProducto("Entrada", "03", "Crema de Trufas", 1000, 0.15);
$arrEntradas["04"] = FProductos::crearProducto("Entrada", "04", "Crema de Zanahora", 120, 0.15);

$arrPlatosFuertes = array();
$arrPlatosFuertes["01"] = FProductos::crearProducto("Platofuerte", "01", "Típico Hondureño", 200, 0.15);
$arrPlatosFuertes["02"] = FProductos::crearProducto("Platofuerte", "02", "Pasta Alfredo", 250, 0.15);
$arrPlatosFuertes["03"] = FProductos::crearProducto("Platofuerte", "03", "Langosta en limon con Brochetas de Salmon", 1100, 0.15);
$arrPlatosFuertes["04"] = FProductos::crearProducto("Platofuerte", "04", "Sopa Marinera", 220, 0.15);

$arrPostres = array();
$arrPostres["00"] = FProductos::crearProducto("Postre", "00", "Sin Postre", 0, 0);
$arrPostres["01"] = FProductos::crearProducto("Postre", "01", "Rosquilla en Miel", 50, 0.15);
$arrPostres["02"] = FProductos::crearProducto("Postre", "02", "Ayote en Miel de Caña", 80, 0.15);
$arrPostres["03"] = FProductos::crearProducto("Postre", "03", "Moos de Chocolote y Menta", 200, 0.15);
$arrPostres["04"] = FProductos::crearProducto("Postre", "04", "Flan de queso", 75, 0.15);

$cmbEntrada = "01";
$cmbPlatoFuerte = "01";
$cmbPostre = "00";
$miOrdenCompra = null;

$misOrdenes = array();

if (isset($_SESSION["misOrdenes"])){
  $misOrdenes = $_SESSION["misOrdenes"];
}

//Detectar si hay un clic
if (isset($_POST["btnEstablecerOrder"])){
  $cmbEntrada = $_POST["cmbEntrada"];
  $cmbPlatoFuerte = $_POST["cmbPlatoFuerte"];
  $cmbPostre = $_POST["cmbPostre"];

  $Entrada = $arrEntradas[$cmbEntrada];
  $PlatoFuerte = $arrPlatosFuertes[$cmbPlatoFuerte];
  $Postre = $arrPostres[$cmbPostre];

  $miOrdenCompra = new OrdenCompra();
  $miOrdenCompra->addProducto($Entrada);
  $miOrdenCompra->addProducto($PlatoFuerte);
  $miOrdenCompra->addProducto($Postre);

  $misOrdenes[] = $miOrdenCompra;
  $_SESSION["misOrdenes"] = $misOrdenes;
}

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

  <form action="tienda.php" method="post">
    <div>
      <label for="cmbEntrada">Entradas</label>
      <select id="cmbEntrada" name="cmbEntrada">
        <?php
        foreach ($arrEntradas as $entrada) {
          echo '<option value="' . $entrada->getCodigo() . '" >' . $entrada->getCodigo() . ' - ' . $entrada->getNombre() . ' (' . $entrada->getPrecio() . ')</option>';
        }
        ?>
      </select>
    </div>
    <div>
      <label for="cmbPlatoFuerte">Plato Fuerte</label>
      <select id="cmbPlatoFuerte" name="cmbPlatoFuerte">
        <?php
        foreach ($arrPlatosFuertes as $item) {
          echo '<option value="' . $item->getCodigo() . '" >' . $item->getCodigo() . ' - ' . $item->getNombre() . ' (' . $item->getPrecio() . ')</option>';
        }
        ?>
      </select>
    </div>
    <div>
      <label for="cmbPostre">Postre</label>
      <select id="cmbPostre" name="cmbPostre">
        <?php
        foreach ($arrPostres as $item) {
          echo '<option value="' . $item->getCodigo() . '" >' . $item->getCodigo() . ' - ' . $item->getNombre() . ' (' . $item->getPrecio() . ')</option>';
        }
        ?>
      </select>
    </div>
    <div>
      <button name="btnEstablecerOrder" type="submit" >Establecer Orden</button>
    </div>
  </form>
</body>
<hr/>
<?php 
  foreach( $misOrdenes as $miOrdenCompra){
  if($miOrdenCompra){
    echo '<table><tr><th>#</th><th>Producto</th><th>Precio</th></tr>';
    $contador = 1;
    foreach($miOrdenCompra->getProductos() as $producto){
      echo sprintf("<tr><td>%d</td><td>%s</td><td>%f</td></tr>", $contador, $producto->getNombre(), $producto->getPrecio());
      $contador++;
    }
    echo sprintf(" <tr><td>SubTotal: %f</td><td>Impuesto: %f</td><td>Total: %f</td></tr></table><hr/>", $miOrdenCompra->getSubtotal(), $miOrdenCompra->getImpuesto(), $miOrdenCompra->getTotal());
  }
  }

?>
</html>
