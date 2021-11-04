<?php

include_once "DbConfig.php";

class Crud{
    private $conn;

    public function __construct(){

        $this->conn = getdbconnection();

    }


    public function create($data_array, $table){

        $colums = implode(',', array_keys($data_array));
        $place_holders= ':'.implode(',:', array_keys($data_array));

        $sql = "INSERT INTO $table ($colums) VALUES ($data_array)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data_array);
        return $this->conn->lastInsertId();
    }




}