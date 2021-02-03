<?php

namespace Dao;

interface ITable{
  public function verificar();
  public function insert($data);
  public function insertBulk($data);
  public function update($key, $data);
  public function delete($key);
  public function find($filters);
  public function findOne($key);
}

?>
