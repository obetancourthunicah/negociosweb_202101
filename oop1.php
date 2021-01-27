<?php 
  require_once "src/flatFunctions.php";
  //require_once "src/math/point.class.php";
  require "autoloader.php";
  use Math\{Point, Line};
  $myPoint = new Point(10,14);
  $myPoint2 = new Point(20, 24);
  $myLine = new Line($myPoint, $myPoint2);
  $pointArray = $myPoint->getPoint();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Orientado a Objetos</title>
</head>
<body>
  <h1>PHP Orientado a Objetos</h1>
  <?php 
    echo holaMundo("Orlando");
    echo '<br/>';
    echo implode(", ",$pointArray);
    echo '<br/>';
    echo $myLine->getLength();
    echo '<br/>';
    echo $myLine->getMidPoint()->toString();
   ?>
</body>
</html>
