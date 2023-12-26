<?php

require 'db.php';

class Insurer {
    // Properties
    private $id;
    private $nom;
    private $address;
    private $email;
    private $phone;
    private $pdo;

    
    public function __construct($id, $nom, $address, $email, $phone) {
        $this->id = $id;
        $this->nom = $nom;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;

        $database = Database::getInstance();
        $this->pdo = $database->getConnection();


    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
}







// Include the Database and Insurer classes
include 'Database.php';
include 'Insurer.php';

// Create an instance of the Insurer class

// Example usage of getter methods
echo $insurer->getId() . "\n";
echo $insurer->getNom() . "\n";
echo $insurer->getAddress() . "\n";
echo $insurer->getEmail() . "\n";
echo $insurer->getPhone() . "\n";
?>





