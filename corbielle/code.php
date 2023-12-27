<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'new_password';
    private $database = 'dbas';
    protected $pdo;

    protected function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
 }
 public  function getConnection()
    {
        return $this->pdo;
    }

 }
 $instance = new Database ();
 $conn = $instance->getConnection();
 var_dump($conn);
?>
