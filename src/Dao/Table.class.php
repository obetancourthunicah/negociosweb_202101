<?php

namespace Dao;

/**
 * Clase base para todos los modelos de datos
 */
class Table{
  protected static $_conn = null;
  protected static function getConn()
  {
    if (self::$_conn == null) {
      self::$_conn = Conn::getConn();
    }
    return self::$_conn;
  }

  protected static function obtenerRegistros($sqlstr, &$conn = null){
    $pConn = null;
    if ($conn != null){
      $pConn = $conn;
    } else {
      $pConn = self::getConn();
    }
    $cursor = $pConn->query($sqlstr);
    $arrRegistros = array();
    while($registro = $cursor->fetchArray(SQLITE3_ASSOC)){
      $arrRegistros[] = $registro;
    }
    return $arrRegistros;
  }

  protected static function obtenerUnRegistro($sqlstr, &$conn = null)
  {
    $pConn = null;
    if ($conn != null) {
      $pConn = $conn;
    } else {
      $pConn = self::getConn();
    }
    $cursor = $pConn->query($sqlstr);
    $registro = $cursor->fetchArray(SQLITE3_ASSOC);
    return $registro;
  }

  protected static function executeNonQuery($sqlstr, &$conn = null){
    $pConn = null;
    if ($conn != null) {
      $pConn = $conn;
    } else {
      $pConn = self::getConn();
    }
    return $pConn->exec($sqlstr);
  }

  protected static function _getStructFrom($structure, $data){
    if (is_array($data) && is_array($structure)) {
      $newData = $structure;
      foreach ($data as $itemKey => $itemVal) {
        if (isset($newData[$itemKey])) {
          $newData[$itemKey] = $itemVal;
        }
      }
      return $newData;
    } else {
      return array();
    }
  }
}

?>
