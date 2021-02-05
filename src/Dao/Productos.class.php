<?php 

namespace Dao;

class Productos implements ITable{
  private $conn;
  
  public static function getStruct(){
    return array(
      "prdId"=>0, "prdName"=>"", "prdPrice"=>0, "prdStatus"=>"ANL", "prdTax"=>0
    );
  }

  public static function getStructFrom($data){
    if (is_array($data)){
      $newData = self::getStruct();
      foreach($data as $itemKey=>$itemVal){
          if(isset($newData[$itemKey])){
            $newData[$itemKey] = $itemVal;
          }
      }
      return $newData;
    }else{
      return array();
    }
  }

  public function __construct(){
      $this->conn = Conn::getConn();
  }
  public function verificar(){
    $sqlDDL = "CREATE TABLE IF NOT EXISTS productos (prdId INTEGER PRIMARY KEY AUTOINCREMENT, prdName TEXT, prdPrice NUMBER, prdStatus TEXT, prdTax NUMBER)";
    $this->conn->exec($sqlDDL);
  }
  public function insert($pdata){
    $data = self::getStructFrom($pdata);
    $insertSQL = "INSERT INTO productos (prdName, prdPrice, prdStatus, prdTax) VALUES('%s',%f, '%s',%f);";
    $status = $this->conn->exec(
      sprintf($insertSQL, $data["prdName"], $data["prdPrice"], $data["prdStatus"], $data["prdTax"] )
    );
    return $status;
  }
  public function insertBulk($data){
    if(is_array($data)){
        $status = array();
        foreach($data as $registro){
          $status[] = $this->insert($registro);
        }
        return $status;
    } else {
      return false;
    }
    /*
       Diferencia entre un clase y un instancia de un clase?
       class Circle{} -> Clase <<< estaticos   self -> referencia a la Clase

       $miCirculo = new Circle() ->instancia de la Clase  $this   referencia a la instancia de l clase
     */
  }
  public function update($pdata){
    $data = self::getStructFrom($pdata);
    $updSql = "UPDATE productos SET prdName='%s', prdPrice=%f, prdStatus='%s', prdTax=%f where prdId=%d ;";
    return $this->conn->exec(
      sprintf($updSql, $data["prdName"], $data["prdPrice"], $data["prdStatus"], $data["prdTax"], $data["prdId"])
    );
    /*
    SQLITE3
    exec  ejecuta DDLS -> instrucciones que no devuelven tuplas //INSERT, UPDATE, DELETE executeNonQuery
    query ejecuta DSI -> instucciones que devuelven tuplas "cusores a data" //SELECT
     */
  }
  public function delete($pdata){
    $data = self::getStructFrom($pdata);
    $delSQL = "DELETE FROM productos where prdId=%d;";
    return $this->conn->exec(
      sprintf($delSQL,$data["prdId"])
    );
  }
  public function find($filters){
    $cursor = $this->conn->query("select * from productos;");
    $productos = array();
    while($producto = $cursor->fetchArray(SQLITE3_ASSOC)){
      $productos[] = $producto;
    }
    return $productos;
  }
  public function findOne($data){

  }
}

?>
