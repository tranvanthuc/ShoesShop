<?php 
namespace core\database;

use \PDO;

class QueryBuilder 
{
  protected $pdo;

  public function __construct($pdo) 
  {
    $this->pdo = $pdo;
  }

  // selectAll
  public function selectAll($table)
  {
    $stm = $this->pdo->prepare("select * from {$table}");

    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_CLASS);
  }

  // insert
  public function insert($table, $params)
  {
    $sql = sprintf(
      'insert into %s (%s) values (%s)',
      $table,
      implode(',', array_keys($params)),
      ':'. implode(', :', array_keys($params))
    );
    try {
      $stm = $this->pdo->prepare($sql);

      $stm->execute($params);
    } catch(PDOException $e){
      die($e->getMessage());
    }
  }

  // update by id
  public function updateById($table, $params,$condition)
  {
    $result = [];
    $keys = array_keys($params);
    $values = array_values($params);
    for($i=0; $i< count($params); $i++) {
      // die(var_dump(gettype($values[$i])));
      if(gettype($values[$i]) === "string")
        $temp = $keys[$i] . "='" .$values[$i]. "'";
      else 
      $temp = $keys[$i] . "=" .$values[$i];
      array_push($result, $temp);
    }
    // die(var_dump($result));
      
    $sql = sprintf(
      'update %s set %s where id=%s',
      $table,
      implode(',', $result),
      
      $condition
    );
    try {
      $stm = $this->pdo->prepare($sql);

      $stm->execute($params);
    } catch(PDOException $e){
      die($e->getMessage());
    }
  }

  // delete by id
  public function deleteById($table, $id) 
  {
    $sql = "delete from {$table} where id={$id}";
    try {
      $stm = $this->pdo->prepare($sql);

      $stm->execute();
    } catch(PDOException $e){
      die($e->getMessage());
    }
  }

  // create query
  public function query($sql)
  {
    try {
      $stm = $this->pdo->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_CLASS);
    } catch(PDOException $e) {
      die($e->getMessage());
    }
  }

  // get by id
  public function getById($table, $id) 
  {
    $sql = "select * from {$table} where id={$id}";
    try {
      $stm = $this->pdo->prepare($sql);

      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_CLASS);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}

?>

