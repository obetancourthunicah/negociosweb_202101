<?php

//Aplicar un patron SINGLETON
namespace Dao;

use SQLite3;

class Conn {
  private static $conn = null;

  private function __construct()
  {}
  private function __clone()
  {}

  public static function getConn(){
    if (self::$conn == null){
      self::$conn = new Sqlite3("tiendadb.db");
    }
    return self::$conn;
  }
}

?>
