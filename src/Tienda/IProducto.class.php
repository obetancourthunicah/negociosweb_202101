<?php

  namespace Tienda;
  
  interface IProducto{
    public function getPrecio();
    public function getNombre();
    public function getImpuesto();
    public function getCodigo();
  }

/*
REPASO DE INTERFACES EN PROGRAMACION ORIENTADA A OBJETO

  interface Animales{
    public function comer();
    public function dormir();
  }

  class Perro implements Animales{
    public function comer(){
      echo "Perro Comio";
    }
    public function dormir(){
      echo "Perro Duerme";
    }
  }

  class Gato implements Animales{
    public function comer(){
      echo "Gato Comio";
    }
    public function dormir(){
      echo "Gato Duerme";
    }
  }

class Perico implements Animales
{
  public function comer()
  {
    echo "Perico Comio";
  }
  public function dormir()
  {
    echo "Perico Duerme";
  }
}

  $arrAnimales = array();
  $arrAnimales[] = new Perro();
  $arrAnimales[] = new Gato();
  $arrAnimales[] = new Perico();

  foreach($arrAnimales as $animal){
    $animal->comer();
    $animal->dormir();
  }
*/
?>
