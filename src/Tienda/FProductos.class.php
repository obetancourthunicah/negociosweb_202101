<?php

namespace Tienda;

class FProductos{
  public static function crearProducto($type,$codigo, $nombre, $precio, $impuesto){
      switch($type){
        case "Entrada":
          return new Entrada($codigo,$nombre, $precio, $impuesto);
        case "Platofuerte":
          return new Platofuerte($codigo, $nombre, $precio, $impuesto);
        case "Postre":
          return new Postre($codigo, $nombre, $precio, $impuesto);
        default:
          return null;
      }
  }
}

?>
