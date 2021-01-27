<?php
namespace Math;
class Point{
  public $x = 0;
  public $y = 0;
  public function getPoint(){
    return array($this->x, $this->y);
  }
  public function toString(){
    return implode(", ", $this->getPoint());
  }
  function __construct($x, $y)
  {
    $this->x = $x;
    $this->y = $y;
  }
}

?>
