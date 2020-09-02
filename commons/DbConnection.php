<?php

class DbConnection{
    public $con;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'dulara_auto_detailing';

    public function __construct(){
        $this->con = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->db
        );

            if(!$this->con->connect_error){
                $GLOBALS['conn'] = $this->con;
            } else {
                echo "DB Not Connected!";
            }
    }
}
