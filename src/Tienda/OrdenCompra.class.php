<?php

namespace Tienda;

class OrdenCompra{
    private $arrProductos = array();
    private $subtotal = 0;
    private $impuesto = 0;
    private $total = 0;
    public function addProducto($producto){
      $this->arrProductos[]=$producto;
      $this->calcularTotal();
    }
    private function calcularTotal(){
      $subtotal = 0;
      $impuesto=0;
      $total=0;
      foreach($this->arrProductos as $producto){
          $total += $producto->getPrecio();
          $subtotal += ($producto->getPrecio() / (1 + $producto->getImpuesto()) );
      }
      $impuesto += $total - $subtotal;

      $this->subtotal = $subtotal;
      $this->impuesto = $impuesto;
      $this->total = $total;
    }

    public function getSubtotal(){
      return $this->subtotal;
    }
    public function getTotal(){
      return $this->total;
    }
    public function getImpuesto(){
      return $this->impuesto;
    }
    public function getProductos(){
      return $this->arrProductos;
    }
}

?>
