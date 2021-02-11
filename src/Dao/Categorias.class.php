<?php

namespace Dao;

class Categorias extends Table{
  private function __construct()
  {}

  public static function getStruct()
  {
    return array(
      "catId" => 0, "catName" => "", "catStatus" => "ANL"
    );
  }
  public static function findAll(){
    $categorias = self::obtenerRegistros("SELECT * from Categorias;");
    return $categorias;
  }
  public static function findOne($data)
  {
    $pData = self::_getStructFrom(self::getStruct(), $data);
    $sqlstr = sprintf("SELECT * from Categorias where catId=%d;", $pData["catId"]);
    $categoria = self::obtenerUnRegistro($sqlstr);
    return $categoria;
  }
  public static function insert($data){
    $pData = self::_getStructFrom(self::getStruct(), $data);
    $sqlins = sprintf(
      "INSERT into Categorias (catName, catStatus) values ('%s', '%s');",
      $pData["catName"],
      $pData["catStatus"]
    );
    return self::executeNonQuery($sqlins);
  }
  public static function update($data)
  {
    $pData = self::_getStructFrom(self::getStruct(), $data);
    $sqlupd = sprintf(
      "UPDATE Categorias set catName = '%s', catStatus= '%s' where catId = %d;",
      $pData["catName"],
      $pData["catStatus"],
      $pData["catId"]
    );
    return self::executeNonQuery($sqlupd);
  }

  public static function delete($data)
  {
    $pData = self::_getStructFrom(self::getStruct(), $data);
    $sqldel = sprintf(
      "DELETE from Categorias where catId = %d;",
      $pData["catId"]
    );
    return self::executeNonQuery($sqldel);
  }

  public static function verificar(){
    $sqlstr = "CREATE TABLE IF NOT EXISTS Categorias (catId INTEGER PRIMARY KEY AUTOINCREMENT, catName TEXT, catStatus TEXT);";
    return self::executeNonQuery($sqlstr);
  }
}
?>
