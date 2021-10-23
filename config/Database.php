<?php 
class Database{
    public $pdo;
    public $host = 'localhost';
    public $dbname='shop';
    public $user = 'root';
    public $pass = '12345678';

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch (PDOException $e) {
            print $e->getMessage();
            die();
        }
    }
}