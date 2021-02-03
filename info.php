<?php
require_once "autoloader.php";

use Dao\Productos;

$TProductos = new Productos();

$TProductos->verificar();
$data = array("prdName"=>"Panadol", "prdPrice"=>100, "prdStatus"=>"ACT", "prdTax"=>0.15);

$TProductos->insert($data);

print_r($TProductos->find(""));
?>
