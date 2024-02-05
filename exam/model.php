<?php
include('./db.php');

    Class post{

        public $obj; 

        function __construct(){
            $this->obj= new db;
        }
        function insert($user, $password, $msg){
            $sql=$this->obj->insert("INSERT INTO users (`name`, `email`, `msg`) VALUES ('$user','$password','$msg')");
            return $sql;
        }
        function output(){
            $sql=$this->obj->select("SELECT * FROM `users`");
            return $sql;
        }
        function sortEntries($column) {
            $sql = $this->obj->select("SELECT * FROM `users` ORDER BY $column");
            return $sql;
        }
    }
?>