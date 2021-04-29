<?php


class DbConnection
{
    public $host;
    public $user;
    public $password;
    public $db;

    function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "dulara_auto_detailing";

        $con = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->db
        );

        if(!$con->connect_error)
        {
            $GLOBALS['conn'] = $con;
        } else {
            echo "DB not connected!";
        }
    }

}