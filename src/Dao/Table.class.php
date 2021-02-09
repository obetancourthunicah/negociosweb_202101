<?php

namespace Dao;

/**
 * Clase base para todos los modelos de datos
 */
class Table{
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
