<?php
class Database {
    private $conn;
    
    public function __construct() {
        $hostDB = "127.0.0.1";
        $nameDB = "gestortareas";
        $userDB = "root";
        $passwordDB = "";
        
        $dsn = "mysql:host=$hostDB;dbname=$nameDB;";
        $this->conn = new PDO($dsn, $userDB, $passwordDB);
    }
    
    public function getConnection() {
        return $this->conn;
    }
}