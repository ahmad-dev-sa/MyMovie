<?php

    function getdbconnection(){

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "MMSDB";

        try{
            $conn = new PDO("mysql:host=$servername;port=8889;dbname=$dbname", $username, $password); 
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            var_dump($conn);

            return $conn;

        }catch(PDOException $e){

            echo "Connection failed: " . $e->getMessage();

        }
    }



?>