<?php

namespace SmartShop;

use PDO;
use FFI\Exception;

/**
 * Database connection
 */
class Db
{
    /** @var Db Class instance */
    public static $instance;

    /** @var PDO PDO connection */
    public PDO $conn;
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function __destruct()
    {
        unset($this->conn);
    }

    /**
     * Executes query and returns result
     * 
     * @param string $sql Qeury for execution
     * 
     * @return array|false Result of query or false on error
     */
    public function query($sql)
    {
        if($stmt = $this->conn->query($sql)) {
            $result = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }

            return $result;
        }
        return false;
    }

    /**
     * Executes query and returns first row
     * 
     * @param string $sql Query for execution
     * 
     * @return array|false One row from result from array or false on error
     */
    public function getRow($sql)
    {
        if($stmt = $this->conn->query($sql)) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return false;
    }

    /**
     * Executes query and returns first value of first row
     * 
     * @param string $sql Query for execution
     * 
     * @return mixed|false First value from first row from result or false on error
     */
    public function getValue($sql)
    {
        if($stmt = $this->conn->query($sql)) {
            return $stmt->fetch(PDO::FETCH_NUM)[0];
        }

        return false;
    }

    /**
     * Executes insert sql query
     * 
     * @param string $table SQL table to which the data is to be inserted
     * @param array $data Data to be inserted
     * 
     * @return int|false Insert ID or false on query fail
     */
    public function insert($table, $data) 
    {
        $data = array_map(function($el) {
            if(is_string($el)) {
                $el = "'". $el . "'";
            }

            return $el;
        }, $data);

        $sql = "INSERT INTO $table";
        $sql .= " (";
        $sql .= implode(",", array_keys($data));
        $sql .= ") VALUES (";
        $sql .= implode(",", $data);
        $sql .= ")";
        
        if($stmt = $this->conn->query($sql)) {
            return $this->conn->lastInsertId();
        }

        return false;
    }

    /**
     * Executes update sql query
     * 
     * @param string $table SQL table where the data is to be updated
     * @param array $data Data to be updated
     * @param string $where WHERE statement
     * 
     * @return int|false Rows affected or false on query fail
     */
    public function update($table, $data, $where)
    {
        $sql = "UPDATE $table SET ";

        $updates = array();
        foreach ($data as $key=>$value) {
            $updates[] = "$key = $value";
        }
        $sql .= implode(',', $updates);
        $sql .= " WHERE $where";

        if($stmt = $this->conn->query($sql)) {
            return $stmt->rowCount();
        }

        return false;
    }
    
    /**
     * Executes delete sql query
     * 
     * @param string $table SQL table 
     * @param string $where SQL WHERE statement
     * 
     * @return int Affected rows
     */
    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table WHERE $where";
        if ($stmt = $this->conn->query($sql)) {
            return $stmt->rowCount();
        }
    }


    /**
     * Returns instance of Db class
     * 
     * @return Db Db instance
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}