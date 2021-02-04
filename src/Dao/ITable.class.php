<?php

namespace Dao;

interface ITable{
  public function verificar();
  public function insert($data);
  public function insertBulk($data);
  public function update($data);
  public function delete($data);
  public function find($filters);
  public function findOne($data);
}

?>
