<?php

require_once "autoloader.php";

use Dao\{Categorias};

$modos = array(
  "INS" => "Nueva Categoría",
  "UPD" => "Actualizar Categoría %s",
  "DSP" => "Detalles de Categoría %s",
  "DEL" => "Eliminar Categoría %s"
);

$mode = "";
$catId = 0;
$catName = "";
$catStatus = "ACT";

if (isset($_GET["mode"]) && isset($modos[$_GET["mode"]])) {
  $mode = $_GET["mode"];
  //Verificar Clicks
  if(isset($_POST["btnGuardar"])){
    if ($mode ="INS"){
      $catName = $_POST["catName"];
      $catStatus = $_POST["catStatus"];
      $data = Categorias::getStruct();
      $data["catName"] = $catName;
      $data["catStatus"] = $catStatus;
      if(Categorias::insert($data)){
        echo '<script>alert("Categoría Agregada Satisfactoriamente."); window.location.assign("ww_list.php");</script>';
        die();
      }
    }
  }
  //Proceso Posterior a los Clicks
  if ($mode == "INS") {
    $modeDsc = $modos[$mode];
  } else {
    $catId = $_GET["catId"];
    $data = Categorias::getStruct();
    $data["catId"] = $catId;
    $categoria = Categorias::findOne($data);
    $catName = $categoria["catName"];
    $catStatus = $categoria["catStatus"];
    $modeDsc = sprintf($modos[$mode], $catName);
  }
} else {
  header("location:ww_list.php");
  die();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $modeDsc; ?></title>
</head>

<body>
  <header>
    <h1><?php echo $modeDsc; ?></h1>
  </header>
  <main>
    <form action="ww_form.php?mode=<?php echo $mode; ?>&catId=<?php echo $catId; ?>" method="post">
      <div><label for="catId">Código</label><input id="catId" name="catId" value="<?php echo $catId;?>" type="text"></div>
      <div><label for="catName">Categoría</label><input id="catName" name="catName" value="<?php echo $catName;?>" type="text"></div>
      <div><label for="catStatus">Estado</label><input id="catStatus" name="catStatus" value="<?php echo $catStatus;?>" type="text"></div>
      <button type="submit" name="btnGuardar">Guardar</button>
      <button type="button" id="btnCancelar">Cancelar</button>
    </form>
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function(){
      document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("ww_list.php");
      });
    });
  </script>
</body>

</html>
