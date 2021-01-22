<?php

// Definicion adecuada de Variables
// ¿¿¿ Qué es Camello Hungaro ???
// Es una nomenclatura

// $cuandolosgatosnoestanlosratonesgranfiestahacen = true;

// $cuadoLosGatosNoEstanLosRatonesGranFiestaHacen = true;

// $bolCuandoLosGatosNoEstanLosRatonesGranFiestaHacen = true;
// $bolTercerEdad = true;

// $intTerceraEdad = 65;

// 1era Regla de Oro
// 500pts si no se cumple: USAR CAMELLO HUNGARO EN LAS VARIABLES

$txtNombre = "";
$txtCorreo = "";

// cadenas de texto
// numericos
// boleanos
// arreglos (listas y diccionarios)
// objetos

// $_POST 
// $_GET

//Como obtener de un metodo get
/*******************
 * Diccionario  [{llave:valor}, {llave:valor},{llave:valor}]
 * $abd = [ llave1: hola, llave2:adios, llave3:Mundo ]
 * $abd["llave2"] // adios
 * 
 * Lista $def = [a,b,c,d,e,f]
 * $vl =$def[2] // c
 */

if (isset($_GET["btnEnviarGet"])) {
  /// Operación Ternaria  ->  condicion ? verdadero : falso;
  $txtNombre = empty($_GET["txtNombre"]) ? "No hay Datos": $_GET["txtNombre"];
}

if (isset($_POST["btnEnviarPost"])){
  $txtCorreo = empty($_POST["txtCorreo"]) ? "No hay Datos": $_POST["txtCorreo"];
}
// strtoupper
// strtolower

// else {
//
// }



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Captura de Datos en PHP</h1>
  <h2>Método GET</h2>
  <form action="phpform1.php" method="get">
      <label for="txtNombre">Nombre Completo</label>
      <input type="text" name="txtNombre" id="txtNombre"
          placeholder="Nombre Completo"
          value="<?php echo $txtNombre; ?>"
      />
      <br/>
      <button name="btnEnviarGet" type="submit">Enviar</button>
  </form>


  <h2>Método POST</h2>
  <form action="phpform1.php" method="post">
      <label for="txtCorreo">Correo Electrónico</label>
      <input type="email" name="txtCorreo" id="txtCorreo"
      placeholder="corre@electroni.co" value="<?php echo $txtCorreo; ?>"/>
      <br/>
      <button type="submit" name="btnEnviarPost">Enviar</button>
  </form>
  <hr/>
  <div>
    <?php
      echo $txtNombre;
      echo '<br/>';
      echo $txtCorreo;
    ?>
  </div>
</body>

</html>
