<?php
require_once "autoloader.php";

use Dao\{Categorias};

//Categorias::verificar();
// $categoria = Categorias::getStruct();
// $categoria["catName"] = "Productos";
// $categoria["catStatus"] = "ACT";

// Categorias::insert($categoria);

$Categorias = Categorias::findAll();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trabajar con Categorías</title>
</head>

<body>
  <header>
    <h1>Trabajar con Categorías</h1>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Código</th>
          <th>Categoría</th>
          <th>Estado</th>
          <th><a href="ww_form.php?mode=INS">Agregar</a></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $contador = 0;
        foreach ($Categorias as $Categoria) {
          $contador++;
        ?>
          <tr>
            <td><?php echo $contador; ?></td>
            <td><?php echo $Categoria["catId"] ?></td>
            <td><?php echo $Categoria["catName"] ?></td>
            <td><?php echo $Categoria["catStatus"] ?></td>
            <td>
              <a href="ww_form.php?mode=UPD&catId=<?php echo $Categoria["catId"] ?>">Editar</a>
              <a href="ww_form.php?mode=DEL&catId=<?php echo $Categoria["catId"] ?>">Eliminar</a>
            </td>
          </tr>
        <?php
        } //foreach $Categorias 
        ?>
      </tbody>
    </table>
  </main>
  <footer></footer>
</body>

</html>
