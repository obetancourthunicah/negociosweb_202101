<?php 
namespace Math;
class Line {
  public $startPoint;
  public $endPoint;

  public function __construct($start, $end){
    $this->startPoint = $start;
    $this->endPoint = $end;
  }

  public function getLength(){
    return sqrt(
      (($this->endPoint->x - $this->startPoint->x) ** 2) +
      (($this->endPoint->y - $this->startPoint->y) ** 2)
    );
  }

  public function getMidPoint(){
    return new Point(
      ($this->startPoint->x + $this->endPoint->x)/2,
      ($this->startPoint->y + $this->endPoint->y) / 2
    );
  }
}

?>
