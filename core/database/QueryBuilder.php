<?php
namespace core\database;
use utils\Functions;
use \PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // selectAll
    public function getAll($table)
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
        implode(', ', array_keys($params)),
        ':'. implode(', :', array_keys($params))
        );
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);
          // get last insert id
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // update by id
    public function updateById($table, $params, $id)
    {
        $result = Functions::getStringParams($params);
        
        $sql = sprintf(
        "update %s set %s where id=%s",
        $table,
        implode(',', $result),
        $id
        );
        try {
        $stm = $this->pdo->prepare($sql);
        $stm->execute($params);
        // die(var_dump($stm));
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
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // delete by params
    public function deleteByParams($table, $params)
    {
        $result = Functions::getStringParams($params);
        $sql = sprintf(
            "delete from %s where %s",
            $table,
            implode(" and ", $result)
        );
        
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
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
    // get by param
    public function getByParams($table, $paramsGetFields, $paramsConditions)
    {
        $result = Functions::getStringParams($paramsConditions);
        $sql = sprintf(
            "select %s from %s where %s",
            implode(", ", $paramsGetFields),
            $table,
            implode(" and ", $result)
        );
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute($paramsConditions);
            return $stm->fetchAll(PDO::FETCH_CLASS);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // check field exists in db
    public function checkDataExist($table, $params) 
    {
        $result = Functions::getStringParams($params);
        
        $sql = sprintf(
        "select * from %s where %s",
        $table,
        implode(" and ", $result)
        );
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);
            return $stm->fetchAll(PDO::FETCH_CLASS);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // get with string condition
    public function getWithStringCondition($table, $paramsGetFields, $strCondition)
    {
        $sql = sprintf(
            "select %s from %s %s",
            implode(", ", $paramsGetFields),
            $table,
            $strCondition
            );
            try {
                $stm = $this->pdo->prepare($sql);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_CLASS);
            } catch(PDOException $e){
                die($e->getMessage());
            }
    }

    // create query delete
    public function queryDelete($sql)
    {
        try {
            $stm = $this->pdo->prepare($sql);
            // die(var_dump($sql));
            $stm->execute();
            // return $stm->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // get all row in table
    public function getAllRow($table)
    {
        $sql = "select count(id) as total from {$table}";
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_CLASS);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //TRANSACTION//
    //begin transaction
    public function beginTrans()
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        $this->pdo->beginTransaction();
    }

    //commit transaction
    public function commitTrans()
    {
        $this->pdo->commit();
    }

    //rollback transaction
    public function rollbackTrans()
    {
        $this->pdo->rollback();
    }
}
