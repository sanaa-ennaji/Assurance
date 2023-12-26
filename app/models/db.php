<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'new_password';
    private $database = 'assurance';
    private static $instance;
    protected $pdo;

    private function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    // a function that check if the connection exists or not no matter how object we creat a new object out of class we still get the same connection 
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    public function getConnection(){
        return $this->pdo;
    }
}
$object = Database::getInstance();
$conn = $object->getInstance();
var_dump($conn);
// $object = Database::getInstance();
// $conn = $object->getInstance();
// var_dump($conn);
// $object = Database::getInstance();
// $conn = $object->getInstance();
// var_dump($conn);
?>







