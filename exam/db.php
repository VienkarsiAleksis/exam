<?php

class db{

    public $conn;
    private $host;
    private $user;
    private $pass;
    private $dbname;
    
    public function __construct(){
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->dbname = "exam";

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if($this->conn->connect_error){
            echo "savienojums neizdevas";
        }
    }
    public function select($data){
        $result = $this->conn->query($data);
        return $result->fetch_all();
    }
    public function insert($data){
        if($this->conn->query($data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
} 

?>