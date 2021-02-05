<?php
require_once "autoloader.php";
// use DAO\{Productos};
//<!-- "prdId"=>0, "prdName"=>"", "prdPrice"=>0, "prdStatus"=>"ANL", "prdTax"=>0 -->

use Dao\Productos;

$prdName = "";
$prdId = 0;
$prdPrice = 0;
$prdStatus = 'ANL';
$prdTax = 0;

$insProducto = new Productos();

if (isset($_POST["btnAgregar"])) {
  $prdName = $_POST["prdName"];
  $prdPrice = floatval($_POST["prdPrice"]);
  $prdStatus = $_POST["prdStatus"];
  $prdTax = floatval($_POST["prdTax"]);

  // Realizar Validaciones
  $newPrdData = Productos::getStruct();
  $newPrdData["prdName"] = $prdName;
  $newPrdData["prdPrice"] = $prdPrice;
  $newPrdData["prdStatus"] = $prdStatus;
  $newPrdData["prdTax"] = $prdTax;

  if ($insProducto->insert($newPrdData)) {
    //Podemos Trabajar algo
  }
} // btnAgregar

if(isset($_POST["btnEliminar"])){

  $data = array();
  $data["prdId"] = intval($_POST["prdId"]);
  $insProducto->delete($data);
}
///
$arrProductos = array();
$arrProductos = $insProducto->find(array());


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mantenimiento de Productos</title>
</head>

<body>
  <h1>Gestión de Productos</h1>

  <form action="productos.php" method="post">
    <section>
      <label for="prdName">Nombre de Producto</label>
      <input type="text" name="prdName" placeholder="Nombre del Producto" id="prdName" value="<?php echo $prdName; ?>" />
    </section>
    <section>
      <label for="prdPrice">Precio</label>
      <input type="number" min="0" max="999999" name="prdPrice" placeholder="Precio del Producto" id="prdPrice" value="<?php echo $prdPrice; ?>" />
    </section>
    <section>
      <label for="prdTax">Impuesto</label>
      <select name="prdTax" id="prdTax">
        <option value="0" <?php echo ($prdTax == 0) ? "selected" : ""; ?>>Sin Impuesto</option>
        <option value="0.15" <?php echo ($prdTax == 0.15) ? "selected" : ""; ?>>15%</option>
        <option value="0.18" <?php echo ($prdTax == 0.18) ? "selected" : ""; ?>>18%</option>
      </select>
    </section>
    <section>
      <label for="prdStatus">Estado</label>
      <select name="prdStatus" id="prdStatus">
        <option value="ACT" <?php echo ($prdStatus == 'ACT') ? "selected" : ""; ?>>Activo</option>
        <option value="INA" <?php echo ($prdStatus == 'INA') ? "selected" : ""; ?>>Inactivo</option>
        <option value="ANL" <?php echo ($prdStatus == 'ANL') ? "selected" : ""; ?>>En Análisis</option>
      </select>
    </section>
    <section>
      <button type="submit" value="enviar" name="btnAgregar">Agregar Nuevo</button>
    </section>
  </form>
  <hr />

  <?php if (count($arrProductos)) {  ?>
    <table>
      <thead>
        <tr>
          <th>Código</th>
          <th>Producto</th>
          <th>Precio</th>
          <th>Impuesto</th>
          <th>Estado</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($arrProductos as $prd){ ?>
        <tr>
          <td><?php echo $prd["prdId"]; ?></td>
          <td><?php echo $prd["prdName"]; ?></td>
          <td><?php echo $prd["prdPrice"]; ?></td>
          <td><?php echo $prd["prdTax"]; ?></td>
          <td><?php echo $prd["prdStatus"]; ?></td>
          <td>
            <form action="productos.php" method="post">
              <input type="hidden" name="prdId" value="<?php echo $prd["prdId"]; ?>"/> 
              <button type="submit" name="btnEliminar" value="Eliminar">Eliminar</button>
            </form>
          </td>
        </tr>
        <?php } //foreach $arrProductos ?>
      </tbody>
    </table>

  <?php  } //end count($arrProductos)
  ?>
</body>

</html>
