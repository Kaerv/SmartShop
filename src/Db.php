<?php

namespace SmartShop;

use PDO;
use FFI\Exception;

/**
 * Database connection
 */
class Db
{

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
}