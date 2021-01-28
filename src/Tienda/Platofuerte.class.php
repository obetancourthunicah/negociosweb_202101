<?php 

namespace Tienda;

class Platofuerte implements IProducto {
  private $codigo;
  private $nombre;
  private $precio;
  private $impuesto;

  public function getCodigo()
  {
    return $this->codigo;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  public function getPrecio()
  {
    return $this->precio;
  }
  public function getImpuesto()
  {
    return $this->impuesto;
  }

  public function __construct($codigo, $nombre, $precio, $impuesto)
  {
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->impuesto = $impuesto;
  }
}

?>
