<?php

class DbConnection{
    public $conn;
    private $hostName = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "dulara_auto_detailing";

    function __construct(){
        $this->conn = new mysqli(
            $this->hostName,
            $this->dbUsername,
            $this->dbPassword,
            $this->dbName   
        );

        if(!$this->conn->connect_error){
            $GLOBALS['con']=$this->conn;
            echo "Success";
        }

        else{
            echo "Not success";
            $GLOBALS["con"]=$this->conn;
        }
    }
}

?>