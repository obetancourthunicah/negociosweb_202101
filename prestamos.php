<?php
// Prestamo
// Capital, Tiempo, Tasa de Interez ---  Tiempo es Anual 
// Tasa de Interez es mensual  0.00 - 1.00
// n = tiempo * 12

// cuota nivelada (anualidad) a= C / (1 - (1 / ( 1 + i))^ n) / i

//Cuota,  Interes, Capital, Capital Saldo
$numCapital = 0;
$intTasaInteres = 10;
$intTiempo = 5;
$fltCN = 0;

//$lstAmortizacion = array(1,5,7,9,10,"alpha"=>"A","B","C");
$lstAmortizacion = array();
// Lista de Diccionarios
/*
  for (var $i = 0; $i<100; $i++ ){
  
  }

  $i = 0;
  while ($i < 100){

    $i++;
  }

  $i=0;
  do {

    $i++;
  }while($i<100);

 */


if (isset($_POST["btnProcesar"])) {
  $numCapital = floatval($_POST["numCapital"]);
  $intTasaInteres = intval($_POST["intTasaInteres"]);
  $intTiempo = intval($_POST["intTiempo"]);

  $fltTI = $intTasaInteres / 12 / 100;
  $fltN = $intTiempo * 12;



  $fltVF = (1 - ((1 / ((1 + $fltTI) ** $fltN)))) / $fltTI;

  $fltCN = $numCapital / $fltVF;

  $numCapitalSaldo = $numCapital;
  for ($i = 0; $i < $fltN; $i++) {
    $numInteres = $numCapitalSaldo * $fltTI;
    if ($i == $fltN - 1) {
      $numCapitalCuota = $numCapitalSaldo - $numInteres;
      $nuevoCapitalSaldo = 0;
    } else {
      $numCapitalCuota = $fltCN - $numInteres;
      $nuevoCapitalSaldo = $numCapitalSaldo - $numCapitalCuota;
    }
    $lstAmortizacion[] = array(
      "capital" => $numCapitalSaldo,
      "cuota" => $fltCN,
      "abonoCapital" => $numCapitalCuota,
      "intereses" => $numInteres,
      "saldo" => $nuevoCapitalSaldo
    );

    $numCapitalSaldo = $nuevoCapitalSaldo;

    ///  ejemplo 
    // create table Personas (
    //   id int(32) primary key,
    //   name varchar(60) NOT NULL,
    //   email varchar(128) NOT NULL
    // )

    // select * from Personas;

    // $Personas = array();
    // $Personas[]= array(
    //   "id"=>1,
    //   "name"=>"Orlando betancourtd",
    //   "email" => "obetancourthunicah@gmail.com"
    // );
    // $Personas[] = array(
    //   "id" => 2,
    //   "name" => "Alguien Mas",
    //   "email" => "fulanito@gmail.com"
    // );
    // $Personas[] = array(
    //   "id" => 3,
    //   "name" => "La Chimoltrufia",
    //   "email" => "blanca@gmail.com"
    // );

  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prestamo</title>
</head>

<body>
  <h1>Cálculo de Tabla de Cuotas de Prestamo Simple</h1>
  <form action="prestamos.php" method="post">
    <label for="numCapital">Capital</label>
    <input type="number" name="numCapital" id="numCapital" value="<?php echo $numCapital; ?>" placeholder="Valor de Capital" />
    <br />
    <label for="intTasaInteres">Tasa de Interes</label>
    <select name="intTasaInteres" id="intTasaInteres">
      <option value="10" <?php echo $intTasaInteres == 10 ? "selected" : ""; ?>>10% Anual</option>
      <option value="20" <?php echo $intTasaInteres == 20 ? "selected" : ""; ?>>20% Anual</option>
      <option value="40" <?php echo $intTasaInteres == 40 ? "selected" : ""; ?>>40% Anual</option>
    </select>
    <br />
    <label for="intTiempo">Tiempo</label>
    <select name="intTiempo" id="intTiempo">
      <option value="1" <?php echo $intTiempo == 1 ? "selected" : ""; ?>>1 Año</option>
      <option value="3" <?php echo $intTiempo == 3 ? "selected" : ""; ?>>3 Años</option>
      <option value="5" <?php echo $intTiempo == 5 ? "selected" : ""; ?>>5 Años</option>
      <option value="10" <?php echo $intTiempo == 10 ? "selected" : ""; ?>>10 Años</option>
    </select>
    <br />
    <button type="submit" name="btnProcesar">Calcular</button>
  </form>
  <hr />
  <?php
  if ($fltCN > 0) {
  ?>
    <div>
      <h2>Tabla de Amortización</h2>
      <strong>Cuota Nivelada: <?php echo $fltCN;  ?></strong>
    </div>
  <?php
  } // $fltCN > 0

  // print_r($lstAmortizacion);
  // echo "<hr/>";
  if (count($lstAmortizacion) > 0) {
  ?>
    <table border="1">
      <thead>
        <tr>
          <th>#</th>
          <th>Capital</th>
          <th>Cuota</th>
          <th>Abono</th>
          <th>Interes</th>
          <th>Saldo</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $contador = 1;
        foreach ($lstAmortizacion as $dicItem) {
        ?>
          <tr>
            <td><?php echo $contador; ?></td>
            <td><?php echo  $dicItem["capital"]; ?></td>
            <td><?php echo  $dicItem["cuota"]; ?></td>
            <td><?php echo  $dicItem["abonoCapital"]; ?></td>
            <td><?php echo  $dicItem["intereses"]; ?></td>
            <td><?php echo  $dicItem["saldo"]; ?></td>
          </tr>
        <?php
          $contador++;
        } //foreach lstAmort 
        /*
      "capital" => $numCapitalSaldo,
      "cuota" => $fltCN,
      "abonoCapital" => $numCapitalCuota,
      "intereses" => $numInteres,
      "saldo" => $nuevoCapitalSaldo
       */
        ?>
      </tbody>
    </table>
  <?php
  } // count
  ?>



</body>

</html>
