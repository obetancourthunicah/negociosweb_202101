<?php 

namespace Dao;

class Productos implements ITable{
  private $conn;
  private $tableName = "productos";
  public function __construct(){
      $this->conn = Conn::getConn();
  }
  public function verificar(){
    $sqlDDL = "CREATE TABLE IF NOT EXISTS productos (prdId INTEGER PRIMARY KEY AUTOINCREMENT, prdName TEXT, prdPrice NUMBER, prdStatus TEXT, prdTax NUMBER)";
    $this->conn->exec($sqlDDL);
  }
  public function insert($data){
    $insertSQL = "INSERT INTO productos (prdName, prdPrice, prdStatus, prdTax) VALUES('%s',%f, '%s',%f);";
    $status = $this->conn->exec(
      sprintf($insertSQL, $data["prdName"], $data["prdPrice"], $data["prdStatus"], $data["prdTax"] )
    );
    return $status;
  }
  public function insertBulk($data){}
  public function update($key, $data){}
  public function delete($key){}
  public function find($filters){
    $cursor = $this->conn->query("select * from productos;");
    return $cursor->fetchArray();
  }
  public function findOne($key){}
}

?>
